<?php

namespace App\Listeners;

use App\Events\UserFollowedEvent;
use App\Mail\UserFollowedMail;
use Illuminate\Support\Facades\Mail;

class UserFollowedListener
{
    public function __construct()
    {
        //
    }

    public function handle(UserFollowedEvent $event)
    {
        Mail::to($event->follow->user->email)->send(new UserFollowedMail($event->follow));
    }
}
