<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class JoinResearchGroupNotification extends Notification
{
    use Queueable;

    protected $researchGroup;
    protected $authUser;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($researchGroup, $authUser)
    {
        $this->researchGroup=$researchGroup;
        $this->authUser=$authUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        return [
            'researchGroup' => $this->researchGroup,
            'authUser' => $this->authUser,
            'user' => $notifiable
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
