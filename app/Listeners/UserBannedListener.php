<?php

namespace App\Listeners;

use App\Events\UserBannedEvent;
use App\Mail\UserBannedMail;
use Illuminate\Support\Facades\Mail;

class UserBannedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param UserBannedEvent $event
     * @return void
     */
    public function handle(UserBannedEvent $event)
    {
        Mail::to($event->user->email)->send(new UserBannedMail($event->user));
    }
}
