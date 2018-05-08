<?php

namespace App\Http\Controllers;

use App\Notifications\PostNotification;

use Illuminate\Support\Facades\Redirect;
use Image;

use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Group;
use App\PostGroup;


class PostController extends Controller
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

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$post_content = $request->input('post_content');
        $userId = Auth::user()->id;
        $groupId = $request->input('groupId');

        $post = PostGroup::firstOrNew(['group_id' => $groupId, 'post_content' => $post_content]);
        $post->user_id = $userId;

        $post->save();

        $theGroup = Group::find($groupId);
        $memberList = User::where('id', '<>', Auth::user()->id)->whereIn('id', $theGroup->users->pluck('id'))->get()->sortBy('last_name');
        
        foreach ($memberList as $member) {
               
            $member->notify(new PostNotification($theGroup, auth()->user()));    
        }

        return redirect()->route('groups.show', ['id' => $groupId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = PostGroup::find($id);
        $post->post_content = $request->input('post_update');

        $post->save();
        
        return redirect()->route('groups.show', ['id' => $post->group_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $post = PostGroup::find($id);

        $post->delete();

        return redirect()->route('groups.show', ['id' => $post->group_id]);
    }
}
