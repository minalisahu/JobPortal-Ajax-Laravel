<?php

namespace App\Listeners;

use App\Events\PasswordChanged;
use App\Notifications\PasswordSuccessfullyChange;

class SendPasswordChangeNotification
{
    /**
     * Handle the event.
     *
     * @param  PasswordChanged  $event
     * @return void
     */
    public function handle(PasswordChanged $event)
    {
        $event->user->notify(new PasswordSuccessfullyChange());
    }
}
