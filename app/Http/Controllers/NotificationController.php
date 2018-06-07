<?php

namespace App\Http\Controllers;

use App\Group;
use App\ResearchGroup;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        // Per passare il tipo di notifica e quale tasto è stato premuto, viene concatenata della roba all'id
        if (strlen($id) == 36) {
            $acceptedNotification = $user->notifications()->where('id', $id)->first();
            Group::find($acceptedNotification->data['group']['id'])->users()->syncWithoutDetaching([$acceptedNotification->data['user']['id'] => ['state' => 'accepted']]);
            $acceptedNotification->delete();
            return redirect()->route('groups.show', $acceptedNotification->data['group']['id']);
        } else if (strlen($id) == 39) {
            $refusedid = substr($id, 0, strlen($id) - 3);
            $acceptedNotification = $user->notifications()->where('id', $refusedid)->first();
            ResearchGroup::find($acceptedNotification->data['researchGroup']['id'])->users()->syncWithoutDetaching([$acceptedNotification->data['user']['id'] => ['state' => 'accepted']]);
            $acceptedNotification->delete();
            return redirect()->route('researchGroups.show', $acceptedNotification->data['researchGroup']['id']);
        } else if (strlen($id) == 40) {
            $refusedid = substr($id, 0, strlen($id) - 4);
            $acceptedNotification = $user->notifications()->where('id', $refusedid)->first();
            $researchGroup = ResearchGroup::find($acceptedNotification->data['researchGroup']['id']);
            $userID = $acceptedNotification->data['authUser']['id'];
            // Se ha premuto su accetta
            if (substr($id, -1) == '1') {
                //Rendo lo user della notfica membro del gruppo
                $researchGroup->users()->syncWithoutDetaching([$userID => ['state' => 'accepted']]);
            } else {
                //Elimino lo user dai membri (pendenti) del gruppo
                $researchGroup->users()->detach($userID);
            }
            $acceptedNotification->delete();
            return redirect()->route('researchGroups.show', $acceptedNotification->data['researchGroup']['id']);
        } else if (strlen($id) == 37) {
            $refusedid = substr($id, 0, strlen($id) - 1);
            $refusedNotification = $user->notifications()->where('id', $refusedid)->first();
            $refusedNotification->delete();
            return redirect()->route('users.index');
        } else if (strlen($id) == 38) {
            $publicationid = substr($id, 0, strlen($id) - 2);
            $publicationNotification = $user->notifications()->where('id', $publicationid)->first();
            $publicationNotification->delete();

            return redirect()->route('users.show', $publicationNotification->data['authUser']['id']);
        } else {
            return redirect()->back();
        }

    }

    public function show()
    {

    }

}
