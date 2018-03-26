<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        if(strlen($id)==36){
            $acceptedNotification = $user->notifications()->where('id', $id)->first();
            Group::find($acceptedNotification->data['group']['id'])->users()->syncWithoutDetaching([$acceptedNotification->data['user']['id'] => ['state' => 'accepted']]);
             $acceptedNotification->delete();
            return redirect()->route('groups.show', $acceptedNotification->data['group']['id']);
        }else if(strlen($id)==37){
            $refusedid = substr($id, 0, strlen($id)-1);
            $refusedNotification = $user->notifications()->where('id', $refusedid)->first();
            $refusedNotification->delete();
            return redirect()->route('users.index');
        }else if(strlen($id)==38){
            $publicationid = substr($id, 0, strlen($id)-2);
            $publicationNotification = $user->notifications()->where('id', $publicationid)->first();
            $publicationNotification->delete();

            return redirect()->route('users.show', $publicationNotification->data['authUser']['id']);
        }else{
            return redirect()->back();
        }

    }

    public function show()
    {


    }

}
