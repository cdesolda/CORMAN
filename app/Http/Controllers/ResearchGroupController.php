<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResearchGroupRequest;
use App\Http\Requests\EditResearchGroupRequest;
use App\Notifications\JoinResearchGroupNotification;
use App\Notifications\ResearchGroupNotification;
use App\Office;
use App\ResearchGroup;
use App\ResearchLine;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Image;

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
                'state' => 'pending',
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
        $authUser = Auth::user();
        $researchGroup = ResearchGroup::find($id);
        $isMember = in_array($authUser->id, $researchGroup->users->pluck('id')->toArray());
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

        return view('Pages.ResearchGroup.detail', ['user' => $authUser, 'researchGroup' => $researchGroup, 'sharesList' => collect(), 'isMember' => $isMember]);
    }

    private function isAdmin($groupID, $userID) {
        $researchGroup = ResearchGroup::find($groupID);
        $adminsList = $researchGroup->admins->pluck('id');
        return in_array($userID, $adminsList->toArray());
    }

    public function requestToJoin()
    {
        $userID = \Route::getCurrentRequest()->query('userID');
        $groupID = \Route::getCurrentRequest()->query('groupID');
        error_log('User ' . print_r($userID, true) . ' requested to join research group ' . print_r($groupID, true));
        $researchGroup = ResearchGroup::find($groupID);
        //Ottengo tutti gli admin del gruppo
        $groupAdmins = $researchGroup->admins();
        $groupAdmins->get()->each(function ($admin) use ($researchGroup, $userID) {
            //Inserisco l'utente tra i membri pendenti del gruppo
            $researchGroup->users()->attach($userID, [
                'role' => 'member',
                'state' => 'pending',
                'created_at' => now(), 
                'updated_at' => now()
            ]);

            error_log('User ' . print_r($admin->first_name, true) . '  ' . print_r($admin->last_name, true) . 'notified!');
            //Mando una notifica ad ogni admin per richiedere l'accettazione
            $admin->notify(new JoinResearchGroupNotification($researchGroup, auth()->user()));
        });

        return redirect()->route('researchGroups.show', ['id' => $groupID]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Auth::user()->groups->find($id);
        $thisgroup = ResearchGroup::find($id);
        $userList = User::where('id', '<>', Auth::user()->id)->whereNotin('id', $thisgroup->users->pluck('id'))->get()->sortBy('last_name');
        $memberList = User::where('id', '<>', Auth::user()->id)
                            ->whereIn('id', $thisgroup->members->pluck('id'))
                            ->get()
                            ->sortBy('last_name');
        $researchLinesList = ResearchLine::all()->diff($thisgroup->research_lines);;
        $officesList = Office::all()->diff($thisgroup->offices);

        $isAdmin = $this->isAdmin($id, Auth::user()->id);

        // error_log(print_r($pendingList->toArray(), true));

        return view('Pages.ResearchGroup.edit', [
            'officesList' => $officesList, 
            'researchLinesList' => $researchLinesList,
            'researchGroup' => $thisgroup, 
            'userList' => $userList,
            'membersList' => $memberList,
            'group' => $thisgroup,
            'isAdmin' => $isAdmin
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditResearchGroupRequest $request, $id)
    {
        $group = ResearchGroup::find($id);
        $group->name = $request->input('group_name');
        $group->description = $request->input('description');

        if (($request->hasFile('profile_photo'))) {
            $file = $request->file('profile_photo');
            if ($file->isValid()) {

                $hashName = "/" . md5($file->path() . date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/researchGroups' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $group->picture_path = $filePath;
            }
        }

        $group->save();

        // Handling add and deletion of group research lines
        $resourceLineList = ResearchLine::all()->pluck('id');
        $groupResearchLineList = $group->research_lines->pluck('id');
        $newResearchLinesList = collect($request->input('researchLines'));

        $removeList = $groupResearchLineList->diff($newResearchLinesList); // get items to delete
        $addList = $newResearchLinesList->diff($groupResearchLineList); //intermediate result
        $createList = $addList->diff($resourceLineList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $group->research_lines()->detach($removeList);
        $group->research_lines()->attach($addList);

        foreach ($createList as $researchLine) {

            $newResearchLine = new ResearchLine;
            $newResearchLine->name = $researchLine;
            $newResearchLine->save();

            $group->research_lines()->attach($newResearchLine);
        }

        // Handling add and deletion of group offices
        $officeList = Office::all()->pluck('id');
        $groupOfficeList = $group->offices->pluck('id');
        $newOfficeList = collect($request->input('offices'));
        
        $removeList = $groupOfficeList->diff($newOfficeList); // get items to delete
        $addList = $newOfficeList->diff($groupOfficeList); //intermediate result
        $createList = $addList->diff($officeList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $group->offices()->detach($removeList);
        $group->offices()->attach($addList);

        foreach ($createList as $office) {

            $newOffice = new Office;
            $newOffice->address = $office;
            $newOffice->save();

            $group->offices()->attach($newOffice);
        }

        // Adding the list of members
        $memberList = $group->users->pluck('id');
        $newMemberList = collect($request->input('users'));

        $remove = $memberList->diff($newMemberList);
        $add = $newMemberList->diff($memberList);

        $group->users()->detach($remove);

        User::where('id', $request->users)->get()->each(function ($user) use ($group, $add) {
            foreach ($add as $useradd) {
                if ($user->id == $useradd) {
                    $group->users()->attach([$useradd  => ['state' => 'pending']]);
                    $user->notify(new ResearchGroupNotification($group, auth()->user()));
                }
            }
        });

        //Editing the list of admins
        $adminsList = $group->admins->pluck('id');
        $newAdminsList = collect($request->input('admins'));

        $remove = $adminsList->diff($newAdminsList);
        $add = $newAdminsList->diff($adminsList);

        foreach ($group->members as $member) {
            $isNewAdmin = in_array($member->id, $add->toArray());
            $isNoMoreAdmin = in_array($member->id, $remove->toArray());
            if ($isNewAdmin) {
                $member->pivot->role = 'admin';
                $member->pivot->save();
            } elseif ($isNoMoreAdmin) {
                $member->pivot->role = 'member';
                $member->pivot->save();
            }
        }

        error_log('Remove ' . print_r($remove, true));

        return redirect()->route('researchGroups.show', ['id' => $group->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Auth::id());
        $group = ResearchGroup::find($id);
        // if ($group->users->find($user->id)->role == 'admin') {
        if ($group->admins->pluck('id')->contains($user->id)) {
            error_log('User ' . $user->id . ' is admin of group ' . $group->id);
            $group->users()->detach();
            $group->members()->detach();
            $group->invited()->detach();
            $group->admins()->detach();
            $group->offices()->detach();
            $group->research_lines()->detach();
            $group->delete();

            return redirect()->route('users.index');

        } else {
            return "You can't delete this group, your are not an admin!";
        }
        return redirect()->route('researchGroups.show', ['id' => $group->id]);
    }

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

    public function ajaxInfo(Request $request)
    {
        $researchGroup = ResearchGroup::find($request->query('id'));
        $researchLinesList = $researchGroup->research_lines;
        $officesList = $researchGroup->offices;
        $memberList = $researchGroup->users; 
        $adminsList = $researchGroup->admins;
        $pendingList = $researchGroup->invited->pluck('id');
        $data = array(
            'researchLinesList' => $researchLinesList, 
            'officesList' => $officesList, 
            'researchLinesList' => $researchLinesList, 
            'adminsList' => $adminsList,
            'memberList' => $memberList,
            'pendingList' => $pendingList
        );
        return response()->json($data);
    }

}
