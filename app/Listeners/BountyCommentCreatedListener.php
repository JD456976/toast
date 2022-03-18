<?php

namespace App\Listeners;

use App\Events\BountyCommentCreatedEvent;
use App\Mail\BountyCommentCreatedMail;
use Illuminate\Support\Facades\Mail;

class BountyCommentCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(BountyCommentCreatedEvent $event)
    {
        Mail::to($event->bounty->user->email)->send(new BountyCommentCreatedMail($event->bounty));
    }
}
