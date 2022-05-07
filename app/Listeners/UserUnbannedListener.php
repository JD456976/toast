<?php

namespace App\Listeners;

use App\Events\UserUnbannedEvent;
use App\Mail\UserUnbannedMail;
use Illuminate\Support\Facades\Mail;

class UserUnbannedListener
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
     * @param UserUnbannedEvent $event
     * @return void
     */
    public function handle(UserUnbannedEvent $event)
    {
        Mail::to($event->user->email)->send(new UserUnbannedMail($event->user));
    }
}
