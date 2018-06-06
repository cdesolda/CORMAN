<?php

namespace App\Http\Controllers;

use App\Notifications\ResearchGroupNotification;

use Illuminate\Support\Facades\Redirect;
use Image;

use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\CreateResearchGroupRequest;

use App\User;
use App\ResearchLine;
use App\Office;
use App\ResearchGroup;



class ResearchGroupController extends Controller
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
        /* vedere todo dashboard pubblicazioni*/
        $researchGroupList = ResearchGroup::get();
        // $researchGroupList = Auth::user()->researchGroups;
        return view('Pages.ResearchGroup.list', ['researchGroupList' => $researchGroupList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieve data from DB
        $researchLinesList = ResearchLine::all();
        $officesList = Office::all();
        $userList = User::where('id', '!=', Auth::id())->get()->sortBy('last_name');

        return view('Pages.ResearchGroup.create', ['researchLinesList' => $researchLinesList, 'userList' => $userList, 'officesList' => $officesList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateResearchGroupRequest $request)
    {
        $newResearchGroup = new ResearchGroup;

        $newResearchGroup->name = $request->input('name');
        $newResearchGroup->description = $request->input('description');
        $newResearchGroup->contacts = $request->input('contacts');

        if (($request->hasFile('picture'))) {
            $file = $request->file('picture');
            if ($file->isValid()) {

                $hashName = "/" . md5($file->path() . date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/researchGroups' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $newResearchGroup->picture_path = $filePath;
            }
        } else {
            $newResearchGroup->picture_path = '/images/researchGroups/researchGroup_icon.png';
        }


        //Increment count for the first member
        $newResearchGroup->subscribers_count = 1;
        $newResearchGroup->save();

        // Adding the creator as admin of the group.
        $newResearchGroup->users()->attach(Auth::id(), ['research_group_id' => $newResearchGroup->id, 'role' => 'admin', 'state' => 'accepted', 'created_at' => now(), 'updated_at' => now()]);

        // Adding the list of researchLines
        $researchLineINList = $request->input('researchLines');
        if (isset($researchLineINList)) {
            foreach ($researchLineINList as $researchLineKey => $researchLineInput) {
                //Search and retrieve the research line from db
                $researchLine = ResearchLine::where('name', $researchLineInput)->first();
                //Check if the research line is already in the db, otherwise create a new one and attach to the user
                if ($researchLine != null) {
                    $newResearchGroup->research_lines()->attach($researchLine->id);
                } else {
                    $newResearchLine = new ResearchLine;
                    $newResearchLine->name = $researchLineInput;
                    $newResearchLine->save();

                    $newResearchGroup->research_lines()->attach($newResearchLine->id);
                }
            }
        }

        // Adding the list of offices
        $officesINList = $request->input('offices');
        if (isset($officesINList)) {
            foreach ($officesINList as $officeKey => $officeInput) {
                //Search and retrieve the office from db
                $office = Office::where('address', $officeInput)->first();
                //Check if the office is already in the db, otherwise create a new one and attach to the user
                if ($office != null) {
                    $newResearchGroup->offices()->attach($office->id);
                } else {
                    $newOffice = new Office;
                    $newOffice->address = $officeInput;
                    $newOffice->save();

                    $newResearchGroup->offices()->attach($newOffice->id);
                }
            }
        }

        // Adding the list of members and send notification
        User::where('id', $request->users)->get()->each(function ($user) use ($newResearchGroup) {
            $newResearchGroup->users()->attach($user->id, [
                'role' => 'member',
                'state' => 'pending'
            ]);

            $user->notify(new ResearchGroupNotification($newResearchGroup, auth()->user()));
        });


        return redirect()->route('researchGroups.show', ['id' => $newResearchGroup->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Replace with shares of publication-group-model
        $authUser =  Auth::user();
        $researchGroup = ResearchGroup::find($id);
        $isMember = in_array($authUser->id, $researchGroup->users->map(function ($user) {
            return $user->id;
        })->toArray());
        // $sharesList = Group::find($id)->shares->sortByDesc('created_at');
        // $groupList = $authUser->groupsAsMember->where('id', '<>', $id);
        // $group = $authUser->groups->find($id);
        // $postList = Group::find($id)->posted->sortByDesc('created_at');

        // $postsGroups = PostGroup::where('group_id', $id)->with('commented')->get();

        // $commentsList = collect();
        
        // foreach ($postsGroups as $postGroup){

        //     foreach($postGroup->commented as $commentPost) {
        //         $commentsList->push($commentPost);
        //     }
        // }
        

        return view('Pages.ResearchGroup.detail', ['user'=>$authUser, 'researchGroup'=>$researchGroup,'sharesList'=>collect(), 'isMember'=>$isMember]);
    }

    public function requestToJoin() {
        $userID = \Route::getCurrentRequest()->query('userID');
        $groupID = \Route::getCurrentRequest()->query('groupID');
        error_log('User ' . print_r($userID, true) . ' requested to join research group ' . print_r($groupID, true));
        return redirect()->route('researchGroups.show', ['id' => $groupID]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     // Replace with shares of publication-group-model
    //     $publicationList = Auth::user()->publications;
    //     $group = Auth::user()->groups->find($id);
    //     $thisgroup = Group::find($id);
    //     $userList = User::where('id', '<>', Auth::user()->id)->whereNotin('id', $thisgroup->users->pluck('id'))->get()->sortBy('last_name');
    //     $topicList = Topic::all()->diff($group->topics);;

    //     return view('Pages.Group.edit', ['topicList' => $topicList, 'publicationList' => $publicationList,
    //         'group' => $group, 'userList' => $userList]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request $request
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(EditGroupRequest $request, $id)
    // {

    //     $group = Group::find($id);
    //     $group->name = $request->input('group_name');
    //     $group->description = $request->input('description');


    //     if (($request->hasFile('profile_photo'))) {
    //         $file = $request->file('profile_photo');
    //         if ($file->isValid()) {

    //             $hashName = "/" . md5($file->path() . date('c'));
    //             $fileName = $hashName . "." . $file->getClientOriginalExtension();
    //             $filePath = 'images/groups' . $fileName;
    //             Image::make($file)->fit(200)->save($filePath);
    //             $group->picture_path = $filePath;
    //         }
    //     }

    //     // Handle group Visibility
    //     if ($request->input('visibility') == 'public') {
    //         $group->public = 'public';
    //     } else {
    //         $group->public = 'private';
    //     }

    //     $group->save();


    //     // Handling add and deletion of group topics
    //     $topicList = Topic::all()->pluck('id');
    //     $groupTopicList = Group::find($id)->topics->pluck('id');
    //     $newTopicList = collect($request->input('topics'));

    //     $removeList = $groupTopicList->diff($newTopicList); // get items to delete
    //     $addList = $newTopicList->diff($groupTopicList); //intermediate result
    //     $createList = $addList->diff($topicList); // get items to create
    //     $addList = $addList->diff($createList); // get items to add

    //     $group->topics()->detach($removeList);
    //     $group->topics()->attach($addList);

    //     foreach ($createList as $topic) {

    //         $newTopic = new Topic;
    //         $newTopic->name = $topic;
    //         $newTopic->save();

    //         $group->topics()->attach($newTopic);
    //     }


    //     // Adding the list of members
    //     $memberList = Group::find($id)->users->pluck('id');
    //     $newMemberList = collect($request->input('users'));

    //     $remove = $memberList->diff($newMemberList);
    //     $add = $newMemberList->diff($memberList);


    //     $group->users()->detach($remove);


    //     User::where('id', $request->users)->get()->each(function ($user) use ($group, $add) {
    //         foreach ($add as $useradd) {
    //             if ($user->id == $useradd) {
    //                 $group->users()->attach([$useradd  => ['state' => 'pending']]);
    //                 $user->notify(new GroupNotification($group, auth()->user()));
    //             }
    //         }
    //     });

    //     if ($request->input('visibility') == 'public') {
    //         $group->public = 'public';
    //     } else {
    //         $group->public = 'private';
    //     }


    //     return redirect()->route('groups.show', ['id' => $group->id]);

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $user = User::find(Auth::id());
    //     $group = Group::find($id);
    //     if ($group->users->find($user->id)->role == 'admin') {
    //         $group->users()->detach($group->id);
    //         $group->members()->detach($group->id);
    //         $group->invited()->detach($group->id);
    //         $group->admins()->detach($group->id);
    //         $group->topics()->detach($group->id);
    //         $group->shares()->detach($group->id);
    //         $group->delete();

    //         Redirect('/users')->with('success', 'Group deleted correctly.');

    //     } else {
    //         return "You can't delete this group, your are not an admin!";
    //     }
    // }

    // public function share(Request $request)
    // {

    //     $publicationList = $request->input('publicationList');
    //     $userId = Auth::user()->id;
    //     $groupId = $request->input('groupId');
    //     foreach ($publicationList as $publication) {
    //         $share = PublicationGroup::firstOrNew(['publication_id' => $publication['id'], 'group_id' => $groupId]);
    //         $share->user_id = $userId;

    //         $share->save();
    //     }
    //     $redirectPath = '/groups/' . $groupId;
    //     return response()->json(['message' => 'Your pubblications have been added! Take a look at',
    //         'redirectTo' => $redirectPath]);

    // }

    // public function leave(Request $request){
    //     $group = Group::find($request->input('groupID'));

    //     $group->users()->detach(Auth::user()->id);

    //     return response()->json(['redirectTo' => '/groups']);
    // }


    // public function ajaxInfo(Request $request)
    // {
    //     $topicList = Group::find($request->query('id'))->topics;
    //     $memberList = Group::find($request->query('id'))->users; //->where('id','<>',Auth::user()->id);
    //     $data = array('topicList' => $topicList, 'memberList' => $memberList);

    //     return response()->json($data);
    // }

}
