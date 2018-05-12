<?php

namespace App\Http\Controllers;

use App\Affiliation;
use App\Http\Requests\EditProfileRequest;
use App\Role;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
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
        /* TODO: tenere conto che bisogna passare i dati dell'utente (immagine, ecc)*/
        $publicationList = Auth::user()->author->publications->sortByDesc('year')->take(1);
        /* TODO: vedere come ordinare gruppi (prima quelli di cui è admin, poi utente, ecc)*/
        $groupList = Auth::user()->groupsAsMember->take(1);
        return view('Pages.User.dashboard', ['publicationList' => $publicationList, 'groupList' => $groupList]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $publicationList = $user->author->publications->sortByDesc('year')->take(25);
        $groupList = $user->groups;
        return view('Pages.memberProfile', ['publicationList' => $publicationList, 'groupList' => $groupList, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roleList = Role::all();
        $affiliationList = Affiliation::all();
        $topicList = Topic::all()->diff($user->topics);
        return view('Pages.User.editUser', ['user' => $user, 'roleList' => $roleList,
            'affiliationList' => $affiliationList, 'topicList' => $topicList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request, User $user)
    {

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');

        $author = $user->author;
        $author->name = $user->first_name . " " . $user->last_name;
        $author->save();

        $user->birth_date = $request->input('dob');
        if ($request->input('email') != null) {
            $user->email = $request->input('email');
        } else {
            $user->email = $user->email;
        }
        if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        } else {
            $user->password = $user->password;
        }

        $user->role_id = $request->input('role');
        $user->affiliation_id = $request->input('affiliation');

        $user->reference_link = $request->input('url');

        // Handling user picture
        if ($request->hasFile('user_pic')) {

            $file = $request->file('user_pic');

            if ($file->isValid()) {

                $hashName = "/" . md5($file->path() . date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/profilePictures' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $user->picture_path = $filePath;
            }
        }

        $user->save();

        // Handling add and deletion of publication topics
        $topicList = Topic::all()->pluck('id');
        $userTopicList = $user->topics->pluck('id');
        $newTopicList = collect($request->input('topics'));

        $removeList = $userTopicList->diff($newTopicList); // get items to delete
        $addList = $newTopicList->diff($userTopicList); //intermediate result
        $createList = $addList->diff($topicList); // get items to create
        $addList = $addList->diff($createList); // get items to add

        $user->topics()->detach($removeList);
        $user->topics()->attach($addList);

        foreach ($createList as $topic) {

            $newTopic = new Topic;
            $newTopic->name = $topic;
            $newTopic->save();

            $user->topics()->attach($newTopic);
        }

        return Redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->publications()->detach(user_id);
        $user->topics()->detach(user_id);
        $user->groups()->detach(user_id);
        $user->affiliation()->delete();
        $user->author()->delete();
        $user->role()->delete();
        $user->delete();

        return Redirect('/')->with('success', 'We are mortified that you wanted to leave our community, we wish you the best, see you next time!');
    }

    public function ajaxInfo()
    {
        $user = Auth::user();

        $topicList = $user->topics;
        $role = $user->role;
        $affiliation = $user->affiliation;
        $data = array('topicList' => $topicList, 'role' => $role, 'affiliation' => $affiliation);

        return response()->json($data);
    }
}
