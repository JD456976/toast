<?php

namespace App\Listeners;

use App\Events\DealCommentCreatedEvent;
use App\Mail\DealCommentCreatedMail;
use Illuminate\Support\Facades\Mail;

class DealCommentCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(DealCommentCreatedEvent $event)
    {
        Mail::to($event->deal->user->email)->send(new DealCommentCreatedMail($event->deal));
    }
}
