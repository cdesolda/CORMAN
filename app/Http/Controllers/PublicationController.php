<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use App\Notifications\PublicationNotification;
use App\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Image;


use App\Http\Requests\CreatePublicationRequest;
use App\Http\Requests\EditPublicationRequest;

use App\Publication;
use App\Journal;
use App\Conference;
use App\Editorship;
use App\Author;
use App\Topic;
use function PHPSTORM_META\type;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publicationList = Auth::user()->author->publications->sortByDesc('year');
        return view('Pages.Publication.list', ['publicationList' => $publicationList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorList = Author::all()->where('id', '!=', Auth::user()->author->id)->sortBy('last_name');
        $topicList = Topic::all()->sortBy('title');
        return view('Pages.Publication.create', ['authorList' => $authorList, 'topicList' => $topicList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePublicationRequest $request)
    {
        //dd($request->all());
        /*
        *Create new publications
        * for all fields of the form fill the field of database
        * for all elements of the author field form input 
        */
        // TODO resolve the resubmission

        // Create new publication
        $newPublication = new Publication;

        $newPublication->title = ucwords($request->input('title'));
        $newPublication->year = $request->input('publication_date');
        $newPublication->venue = ucwords($request->input('venue'));
        $newPublication->type = $request->input('type');

        if ($request->input('visibility') == 'public') {
            $newPublication->public = 1;
        } else {
            $newPublication->public = 0;
        }

        //Handling Media
        
        //  Random unique folder name for each publication
        //       '/images/publicationMedia/nomefile.png'
        $folderName = md5(date('c').str_random(25));
        $folderPath = File::makeDirectory(public_path() . "/images/publicationMedia/" . $folderName);
        
        //  Trattamento media nel form

        if ($request->hasFile('pdf_file')) {
            if ( isset($request->pdf_file) ) {

                $fileName = str_random(15) . '.' . $request->file('pdf_file')->getClientOriginalExtension();
                $request->file('pdf_file')->move(public_path() . "/images/publicationMedia/" . $folderName.'/', $fileName);

            }
        }


        $files = $request->file('media_file');
        if ($request->hasFile('media_file')) {
            if ( isset($request->media_file) ) {

                foreach ($files as $file) {

                    $fileName = str_random(15) . '.' . $file->getClientOriginalExtension();
                    $filePath = public_path() . "/images/publicationMedia/" . $folderName.'/'.$fileName;
                    Image::make($file)->save($filePath);

                }

            }
        }

        //  Salvataggio path del folder '/nomeRandomFolder'
        $newPublication->multimedia_path = '/' . $folderName;
        $newPublication->save();


        // Handling Publication Details
        switch ($newPublication->type) {
            case 'journal':
                $newJournal = new Journal;

                $newJournal->abstract = $request->input('abstract');
                $newJournal->volume = $request->input('volume');
                $newJournal->number = $request->input('number');
                $newJournal->pages = $request->input('pages');
                $newJournal->key = $request->input('key');
                $newJournal->doi = $request->input('doi');
                $newJournal->ee = $request->input('ee');
                $newJournal->url = $request->input('url');

                $newJournal->publication_id = $newPublication->id;
                $newJournal->save();
                break;

            case 'conference':
                $newConference = new Conference;

                $newConference->abstract = $request->input('abstract');
                $newConference->pages = $request->input('pages');
                $newConference->days = $request->input('days');
                $newConference->key = $request->input('key');
                $newConference->doi = $request->input('doi');
                $newConference->ee = $request->input('ee');
                $newConference->url = $request->input('url');

                $newConference->publication_id = $newPublication->id;
                $newConference->save();
                break;

            case 'editorship':
                $newEditorship = new Editorship;

                $newEditorship->abstract = $request->input('abstract');
                $newEditorship->volume = $request->input('volume');
                $newEditorship->publisher = $request->input('publisher');
                $newEditorship->key = $request->input('key');
                $newEditorship->doi = $request->input('doi');
                $newEditorship->ee = $request->input('ee');
                $newEditorship->url = $request->input('url');

                $newEditorship->publication_id = $newPublication->id;
                $newEditorship->save();
                break;
        }


        // Handling topics
        $topicInputList = $request->input('topics');
        if (isset($topicInputList)) {
            foreach ($topicInputList as $topicKey => $topicInput) {
                $topicInput = strtolower($topicInput);
                //Search and retrieve the topic from db
                $topic = Topic::where('name', $topicInput)->first();
                //Check if the topic is already in the db, otherwise create a new one and attach to the user
                if ($topic != null) {
                    $newPublication->topics()->attach($topic->id);
                } else {
                    $newTopic = new Topic;
                    $newTopic->name = $topicInput;
                    $newTopic->save();

                    $newPublication->topics()->attach($newTopic->id);
                }
            }
        }
        
        // Handling Authors and user
        //Add the user as self author
        $newPublication->users()->attach(Auth::user()->id);
        $newPublication->authors()->attach(Auth::user()->author->id);
                
        $authorList = Author::all()->pluck('id');
        $newAuthorList = collect($request->input('authors'));

        $createList = $newAuthorList->diff($authorList);
        $addList = $newAuthorList->diff($createList); // get items to add

        $newPublication->authors()->attach($addList);

        foreach ($createList as $author) {
            $newAuthor = new Author;
            $newAuthor->name = $author;
            $newAuthor->save();

            $newPublication->authors()->attach($newAuthor);
        }

        foreach ($addList as $id) {

            $user_id = Author::find($id)->user_id;
            if ($user_id != null) {
                User::where('id', $user_id)->get()->each(function ($user) use ($newPublication) {
                    $user->notify(new PublicationNotification($newPublication, auth()->user()));
                });
            }

        }


        return redirect()->route('publications.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Auth::user()->author->publications->where('id', $id);
        //dd($publication);
        return view('Pages.Publication.modal', ['publication' => $publication]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Return topic list and author list for dynamic filling of view dropodowns,

          diff method is used to avoid duplicates of <option> html tags due to the ajax calls (ajaxInfo method).
        */

        $publication = Publication::find($id);
        $topicList = Topic::all()->diff($publication->topics);
        $authors = Author::all()->diff($publication->authors);
        return view('Pages.Publication.edit', ['publication' => $publication, 'authors' => $authors, 'topicList' => $topicList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPublicationRequest $request, $id)
    {


        // Retrieve the publication
        $publication = Publication::find($id);

        $publication->title = ucwords($request->input('title'));
        $publication->year = $request->input('pub_date');
        $publication->venue = ucwords($request->input('venue'));

        if ($request->input('visibility') == 'public') {
            $publication->public = 1;
        } else {
            $publication->public = 0;
        }

        // TODO Handling Media
        //dd($request->all());

        //  Random unique folder name for each publication

        $folderName = $publication->multimedia_path;

        //  Trattamento media nel form

        if ($request->hasFile('pdf_file')) {
            if ( isset($request->pdf_file) ) {
                $oldPdf = $publication->getPublicationPDF();
                //dd(realpath(public_path($oldPdf)));
                if ( !empty($oldPdf) ){
                    unlink(realpath(public_path($oldPdf)));
                }
                
                $fileName = str_random(15) . '.' . $request->file('pdf_file')->getClientOriginalExtension();
                $request->file('pdf_file')->move(public_path() . "/images/publicationMedia/" . $folderName.'/', $fileName);

            }
        }


        $files = $request->file('media_file');
        if ($request->hasFile('media_file')) {
            if ( isset($request->media_file) ) {
                foreach ($files as $file) {

                    $fileName = str_random(15) . '.' . $file->getClientOriginalExtension();
                    $filePath = public_path() . "/images/publicationMedia/" . $folderName.'/'.$fileName;
                    Image::make($file)->save($filePath);

                }
            }
        }

        $publication->save();

        // Handling add and deletion of publication authors
        $authorList = Author::all()->pluck('id');
        $publicationAuthorList = Publication::find($id)->authors->pluck('id');
        $newAuthorList = collect($request->input('authors'));


        $removeList = $publicationAuthorList->diff($newAuthorList); // get items to delete
        $addList = $newAuthorList->diff($publicationAuthorList); //intermediate result
        $createList = $addList->diff($authorList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $publication->authors()->detach($removeList);
        $publication->authors()->attach($addList);

        foreach ($createList as $author) {
            $newAuthor = new Author;
            $newAuthor->name = $author;
            $newAuthor->save();

            $publication->authors()->attach($newAuthor);
        }

        foreach ($addList as $id) {
            $user_id = Author::find($id)->user_id;
            if ($user_id != null) {
                User::where('id', $user_id)->get()->each(function ($user) use ($publication) {
                    $user->notify(new PublicationNotification($publication, auth()->user()));
                });
            }
        }

        // Handling add and deletion of publication topics
        $topicList = Topic::all()->pluck('id');
        $publicationTopicList = Publication::find($id)->topics->pluck('id');
        $newTopicList = collect($request->input('topics'));

        $removeList = $publicationTopicList->diff($newTopicList); // get items to delete
        $addList = $newTopicList->diff($publicationTopicList); //intermediate result
        $createList = $addList->diff($topicList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $publication->topics()->detach($removeList);
        $publication->topics()->attach($addList);

        foreach ($createList as $topic) {

            $newTopic = new Topic;
            $newTopic->name = $topic;
            $newTopic->save();

            $publication->topics()->attach($newTopic);
        }

        // Handling Publication Details
        switch ($publication->type) {
            case 'journal':
                $journal = $publication->details;

                $journal->abstract = $request->input('abstract');
                $journal->volume = $request->input('volume');
                $journal->number = $request->input('number');
                $journal->pages = $request->input('pages');
                $journal->key = $request->input('key');
                $journal->doi = $request->input('doi');
                $journal->ee = $request->input('ee');
                $journal->url = $request->input('url');

                $journal->publication_id = $publication->id;
                $journal->save();
                break;

            case 'conference':
                $conference = $publication->details;

                $conference->abstract = $request->input('abstract');
                $conference->pages = $request->input('pages');
                $conference->days = $request->input('days');
                $conference->key = $request->input('key');
                $conference->doi = $request->input('doi');
                $conference->ee = $request->input('ee');
                $conference->url = $request->input('url');

                $conference->publication_id = $publication->id;
                $conference->save();
                break;

            case 'editorship':
                $newEditorship = $publication->details;

                $newEditorship->abstract = $request->input('abstract');
                $newEditorship->volume = $request->input('volume');
                $newEditorship->publisher = $request->input('publisher');
                $newEditorship->key = $request->input('key');
                $newEditorship->doi = $request->input('doi');
                $newEditorship->ee = $request->input('ee');
                $newEditorship->url = $request->input('url');

                $newEditorship->publication_id = $publication->id;
                $newEditorship->save();
                break;
        }


        return redirect()->route('publications.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $publication = Publication::find($id);
        $publication->users()->detach($publication->id);
        $publication->topics()->detach($publication->id);
        $publication->authors()->detach($publication->id);
        $publication->details()->delete();


        //$publication->delete();

        //Redirect('/users')->with('success', 'Publication deleted correctly.');
        
        return redirect('/users')->with('success', 'Publication deleted correctly.');
        */
       
        $publication = Publication::find($id);

        $publication->delete();

        session()->flash('message', 'Publication deleted correctly.');
        return redirect('/publications')->with('success', 'Publication deleted correctly.');

    }

    public function syncDBLP(Request $request)
    {   /* Due to nested eand higly variable json structuture from DBLP
        we must cleanup the json response!
        -authors and venue could be array so we must iterate trough it and create a 
        string concatenation of elements */
        $count = 100;
        $client = new Client(['base_uri' => 'http://dblp.org/search/publ/api', 'timeout' => 5.0]);

        //sanitazing for dblp syntax and manually build the parameters' string
        $firstName = str_replace(" ", "_", $request->query('first_name'));
        $lastName = str_replace(" ", "_", $request->query('last_name'));
        $authName = $firstName . '_' . $lastName;
        $paramString = "?q=author" . "%3A" . $authName . "&format=json" . "&h=" . $count;

        // Call dblp api and decode response as json
        $response = json_decode($client->request('GET', $paramString)->getBody(), true); #contact dblp web service restful api and get response

        if (array_key_exists('hit', $response['result']['hits'])) { //check if DBLP have returned some data (hit field is present)
            $response = $response['result']['hits']['hit'];
            $pubList = array();

            $supportedTypes = ['Journal Articles', 'Conference and Workshop Papers', 'Editorship'];
            // Clean up DBLP json response for our needs
            foreach ($response as $publication) {
                $requiredFields = array('title', 'venue', 'authors', 'year');
                //Check if at least the required fields are present, otherwise skip
                if (count(array_diff_key(array_flip($requiredFields), $publication['info'])) == 0) {
                    // Check if $publication type is supported by corman otherwise skip it!
                    if (in_array($publication['info']['type'], $supportedTypes)) {
                        $authorList = '';
                        $authors = $publication['info']['authors']['author'];
                        if (is_array($authors)) {
                            foreach ($authors as $author) {
                                if ($author === end($authors)) {
                                    $authorList .= $author;
                                } else {
                                    $authorList .= $author . ', ';
                                }
                            }
                            $publication['info']['authors'] = $authorList;
                        } else { // just one authors
                            $publication['info']['authors'] = $authors;
                        }
                        // 
                        $venueList = '';
                        $venues = $publication['info']['venue'];
                        if (is_array($venues)) {
                            foreach ($venues as $venue) {
                                if ($venue === end($venues)) {
                                    $venueList .= $venue;
                                } else {
                                    $venueList .= $venue . ', ';
                                }
                            }
                            $publication['info']['venue'] = $venueList;
                        } else { // just one authors
                            $publication['info']['venue'] = $venues;
                        }

                        array_push($pubList, $publication['info']);
                    }
                }
            }
            $jsonInfo = array('data' => $pubList);
        } else {
            $jsonInfo = array('data' => array());
        }

        //dd(json_encode($jsonInfo));
        return response()->json($jsonInfo);
    }

    public function syncToCorman(Request $request)
    {

        //dd($request->all());
        foreach ($request->all() as $publication) {

            $newPublication = new Publication;
            //Set general fields

            $newPublication->title = ucwords($publication['title']);

            $date = new \DateTime();
            $date->setDate($publication['year'], 1, 1); //set default date to the first of the <year>
            $newPublication->year = $date;

            $newPublication->venue = ucwords($publication['venue']);
            $newPublication->public = 1;

            $folderName = md5(date('c').str_random(25));
            File::makeDirectory(public_path() . "/images/publicationMedia/" . $folderName);

            $newPublication->multimedia_path = '/' . $folderName; //TODO handle automatic folder creation

            // Mapping DBLP type to CORMAN type
            switch ($publication['type']) {
                case 'Journal Articles':
                    $newPublication->type = 'journal';
                    break;
                case 'Conference and Workshop Papers':
                    $newPublication->type = 'conference';
                    break;
                case 'Editorship':
                    $newPublication->type = 'editorship';
                    break;
            }

            $newPublication->save();


            // Handling Publication Details fields
            switch ($newPublication->type) {
                case 'journal':
                    $journal = new Journal;
                    if (array_key_exists('volume', $publication))
                        $journal->volume = $publication['volume'];
                    if (array_key_exists('number', $publication))
                        $journal->number = $publication['number'];
                    if (array_key_exists('pages', $publication))
                        $journal->pages = $publication['pages'];
                    if (array_key_exists('key', $publication))
                        $journal->key = $publication['key'];
                    if (array_key_exists('doi', $publication))
                        $journal->doi = $publication['doi'];
                    if (array_key_exists('ee', $publication))
                        $journal->ee = $publication['ee'];
                    if (array_key_exists('url', $publication))
                        $journal->url = $publication['url'];

                    $journal->publication_id = $newPublication->id;
                    $journal->save();
                    break;

                case 'conference':
                    $conference = new Conference;

                    if (array_key_exists('pages', $publication))
                        $conference->pages = $publication['pages'];
                    if (array_key_exists('key', $publication))
                        $conference->key = $publication['key'];
                    if (array_key_exists('doi', $publication))
                        $conference->doi = $publication['doi'];
                    if (array_key_exists('ee', $publication))
                        $conference->ee = $publication['ee'];
                    if (array_key_exists('url', $publication))
                        $conference->url = $publication['url'];

                    $conference->publication_id = $newPublication->id;
                    $conference->save();
                    break;

                case 'editorship':
                    $editorship = new Editorship;
                    if (array_key_exists('volume', $publication))
                        $editorship->volume = $publication['volume'];
                    if (array_key_exists('publisher', $publication))
                        $editorship->publisher = $publication['publisher'];
                    if (array_key_exists('key', $publication))
                        $editorship->key = $publication['key'];
                    if (array_key_exists('doi', $publication))
                        $editorship->doi = $publication['doi'];
                    if (array_key_exists('ee', $publication))
                        $editorship->ee = $publication['ee'];
                    if (array_key_exists('url', $publication))
                        $editorship->url = $publication['url'];

                    $editorship->publication_id = $newPublication->id;
                    $editorship->save();
                    break;
            }

            // Handling authors
            $authorList = explode(', ', $publication['authors']);
            foreach ($authorList as $author) {
                $theAuthor = Author::firstOrCreate(['name' => $author]);
                $newPublication->authors()->attach($theAuthor->id);
            }


        }
        return response()->json(['message' => 'Your pubblications are now in corman! Take a look',
            'redirectTo' => '/users']);
    }


    public function syncPublications()
    {

        return view('Pages.syncPublications', ['user' => Auth::user()]);
    }

    public function ajaxInfo(Request $request)
    {
        $topicList = Publication::find($request->query('id'))->topics;
        $authorList = Publication::find($request->query('id'))->authors;//->where('id','!=',Auth::user()->author->id);
        $data = array('topicList' => $topicList, 'authorList' => $authorList);

        return response()->json($data);
    }


    public function ajaxGetPublications(Request $request)
    {
        $publicationList = Auth::user()->author->publications->shuffle();
        $data = array('data' => $publicationList);

        return response()->json($data);
    }

}
