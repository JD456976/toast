<?php

namespace App\Listeners;

use App\Events\CommentCreatedEvent;
use App\Mail\CommentCreatedMail;
use Illuminate\Support\Facades\Mail;

class CommentCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(CommentCreatedEvent $event)
    {
        Mail::to($event->deal->user->email)->send(new CommentCreatedMail($event->deal));
    }
}
