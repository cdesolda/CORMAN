<?php

namespace App\Http\Controllers;

use App\Notifications\CommentNotification;

use Illuminate\Support\Facades\Redirect;
use Image;

use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Group;
use App\PostGroup;
use App\PostComment;

class CommentController extends Controller
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
    	$comment_content = $request->input('comment_content');
        $userId = Auth::user()->id;
        $postId = $request->input('postId');
        $groupId = $request->input('groupId');

        $comment = PostComment::firstOrNew(['post_group_id' => $postId, 'comment_content' => $comment_content]);
        $comment->user_id = $userId;

        $comment->save();

        $theGroup = Group::find($groupId);
        $thePost = PostGroup::find($postId);
        
        $memberList = Group::find($groupId)->users->pluck('id');
        $postMembers = User::where('id', '<>', Auth::id())->whereIn('id', $memberList)->whereHas('commented', 
            function ($query) use ($postId) {
                $query->where('post_group_id', $postId);
            })->get();

        foreach ($postMembers as $member) {
               
            $member->notify(new CommentNotification($theGroup, auth()->user()));    
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
        $comment = PostComment::find($id);
        $comment->comment_content = $request->input('comment_update');
        $groupId = $request->input('groupId');
        $comment->save();
        
        return redirect()->route('groups.show', ['id' => $groupId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
        $comment = PostComment::find($id);
        $groupId = $request->input('groupId');

        $comment->delete();

        return redirect()->route('groups.show', ['id' => $groupId]);
    }
}
