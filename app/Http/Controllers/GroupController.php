<?php

namespace App\Http\Controllers;

use App\Notifications\GroupNotification;

use Illuminate\Support\Facades\Redirect;
use Image;

use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\EditGroupRequest;

use App\User;
use App\Topic;
use App\Group;
use App\PublicationGroup;


class GroupController extends Controller
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
        $groupList = Auth::user()->groups;
        return view('Pages.Group.list', ['groupList' => $groupList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieve data from DB
        $topicList = Topic::all();
        $userList = User::where('id', '!=', Auth::id())->get()->sortBy('last_name');

        return view('Pages.Group.create', ['topicList' => $topicList, 'userList' => $userList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $newGroup = new Group;

        $newGroup->name = $request->input('name');
        $newGroup->description = $request->input('description');
        //$newGroup->picture_path = $request->input('picture');

        if (($request->hasFile('picture'))) {
            $file = $request->file('picture');
            if ($file->isValid()) {

                $hashName = "/" . md5($file->path() . date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/groups' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $newGroup->picture_path = $filePath;
            }
        } else {
            $newGroup->picture_path = '/images/groups/group_icon.png';
            //TODO replace default path in database table
        }

        if ($request->input('visibility') == 'public') {
            $newGroup->public = 'public';
        } else {
            $newGroup->public = 'private';
        }


        //Increment count for the first member
        $newGroup->subscribers_count = 1;
        $newGroup->save();

        // Adding the creator as admin of the group.
        $newGroup->users()->attach(Auth::id(), ['group_id' => $newGroup->id, 'role' => 'admin', 'state' => 'accepted', 'created_at' => now(), 'updated_at' => now()]);

        // Adding the list of topic
        $topicINList = $request->input('topics');
        if (isset($topicINList)) {
            foreach ($topicINList as $topicKey => $topicInput) {
                $topicInput = strtolower($topicInput);
                //Search and retrieve the topic from db
                $topic = Topic::where('name', $topicInput)->first();
                //Check if the topic is already in the db, otherwise create a new one and attach to the user
                if ($topic != null) {
                    $newGroup->topics()->attach($topic->id);
                } else {
                    $newTopic = new Topic;
                    $newTopic->name = $topicInput;
                    $newTopic->save();

                    $newGroup->topics()->attach($newTopic->id);
                }
            }
        }

        // Adding the list of members and send notification
        User::where('id', $request->users)->get()->each(function ($user) use ($newGroup) {
            $newGroup->users()->attach($user->id, [
                'role' => 'member',
                'state' => 'pending'
            ]);

            $user->notify(new GroupNotification($newGroup, auth()->user()));
        });


        return redirect()->route('groups.show', ['id' => $newGroup->id]);
        // TODO handling private field $newGroup->isPrivate =
        // Handling user invitations


        // Handling user as admin


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
        $sharesList = Group::find($id)->shares->sortByDesc('created_at');
        $groupList = $authUser->groupsAsMember->where('id', '<>', $id);
        $group = $authUser->groups->find($id);
        return view('Pages.Group.detail', ['sharesList' => $sharesList, 'groupList' => $groupList, 'theGroup' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Replace with shares of publication-group-model
        $publicationList = Auth::user()->publications;
        $group = Auth::user()->groups->find($id);
        $userList = User::where('id', '<>', Auth::user()->id)->get()->sortBy('last_name');
        $topicList = Topic::all()->diff($group->topics);;

        return view('Pages.Group.edit', ['topicList' => $topicList, 'publicationList' => $publicationList,
            'group' => $group, 'userList' => $userList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditGroupRequest $request, $id)
    {

        $group = Group::find($id);
        $group->name = $request->input('group_name');
        $group->description = $request->input('description');


        if (($request->hasFile('profile_photo'))) {
            $file = $request->file('profile_photo');
            if ($file->isValid()) {

                $hashName = "/" . md5($file->path() . date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/groups' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $group->picture_path = $filePath;
            }
        }

        // Handle group Visibility
        if ($request->input('visibility') == 'public') {
            $group->public = 'public';
        } else {
            $group->public = 'private';
        }

        $group->save();


        // Handling add and deletion of group topics
        $topicList = Topic::all()->pluck('id');
        $groupTopicList = Group::find($id)->topics->pluck('id');
        $newTopicList = collect($request->input('topics'));

        $removeList = $groupTopicList->diff($newTopicList); // get items to delete
        $addList = $newTopicList->diff($groupTopicList); //intermediate result
        $createList = $addList->diff($topicList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $group->topics()->detach($removeList);
        $group->topics()->attach($addList);

        foreach ($createList as $topic) {

            $newTopic = new Topic;
            $newTopic->name = $topic;
            $newTopic->save();

            $group->topics()->attach($newTopic);
        }


        // Adding the list of members
        $memberList = Group::find($id)->users->pluck('id');
        $newMemberList = collect($request->input('users'));

        $remove = $memberList->diff($newMemberList);
        $add = $newMemberList->diff($memberList);


        $group->users()->detach($remove);


        User::where('id', $request->users)->get()->each(function ($user) use ($group, $add) {
            foreach ($add as $useradd) {
                if ($user->id == $useradd) {
                    $group->users()->attach([$useradd  => ['state' => 'pending']]);
                    $user->notify(new GroupNotification($group, auth()->user()));
                }
            }
        });

        if ($request->input('visibility') == 'public') {
            $group->public = 'public';
        } else {
            $group->public = 'private';
        }


        return redirect()->route('groups.show', ['id' => $group->id]);

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
        $group = Group::find($id);
        if ($group->users->find($user->id)->role == 'admin') {
            $group->users()->detach($group->id);
            $group->members()->detach($group->id);
            $group->invited()->detach($group->id);
            $group->admins()->detach($group->id);
            $group->topics()->detach($group->id);
            $group->shares()->detach($group->id);
            $group->delete();

            Redirect('/users')->with('success', 'Group deleted correctly.');

        } else {
            return "You can't delete this group, your are not an admin!";
        }
    }

    public function share(Request $request)
    {

        $publicationList = $request->input('publicationList');
        $userId = Auth::user()->id;
        $groupId = $request->input('groupId');
        foreach ($publicationList as $publication) {
            $share = PublicationGroup::firstOrNew(['publication_id' => $publication['id'], 'group_id' => $groupId]);
            $share->user_id = $userId;

            $share->save();
        }
        $redirectPath = '/groups/' . $groupId;
        return response()->json(['message' => 'Your pubblications have been added! Take a look at',
            'redirectTo' => $redirectPath]);

    }

    public function leave(Request $request){
        $group = Group::find($request->input('groupID'));

        $group->users()->detach(Auth::user()->id);

        return response()->json(['redirectTo' => '/groups']);
    }


    public function ajaxInfo(Request $request)
    {
        $topicList = Group::find($request->query('id'))->topics;
        $memberList = Group::find($request->query('id'))->users; //->where('id','<>',Auth::user()->id);
        $data = array('topicList' => $topicList, 'memberList' => $memberList);

        return response()->json($data);
    }


}
