<?php

namespace App\Listeners;

use App\Events\BlogCommentCreatedEvent;
use App\Mail\BlogCommentCreatedMail;
use Illuminate\Support\Facades\Mail;

class BlogCommentCreatedListener
{
    public function __construct()
    {
        //
    }

    public function handle(BlogCommentCreatedEvent $event)
    {
        Mail::to($event->blog->user->email)->send(new BlogCommentCreatedMail($event->blog));
    }
}
