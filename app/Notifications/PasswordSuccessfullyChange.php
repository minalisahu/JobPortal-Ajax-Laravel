<?php

namespace App\Notifications;

use App\Mail\PasswordSuccessfullyChange as MailPasswordSuccessfullyChange;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PasswordSuccessfullyChange extends Notification
{
    use Queueable;

    //public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailPasswordSuccessfullyChange($notifiable));
    }
}
