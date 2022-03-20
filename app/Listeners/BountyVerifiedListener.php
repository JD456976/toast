<?php

namespace App\Listeners;

use App\Events\BountyVerifiedEvent;
use App\Mail\BountyVerifiedMail;
use Illuminate\Support\Facades\Mail;

class BountyVerifiedListener
{
    public function __construct()
    {
        //
    }

    public function handle(BountyVerifiedEvent $event)
    {
        Mail::to($event->bounty->user->email)->send(new BountyVerifiedMail($event->bounty));
    }
}
