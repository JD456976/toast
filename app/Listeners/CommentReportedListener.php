<?php

namespace App\Listeners;

use App\Events\CommentReportedEvent;
use App\Mail\CommentReportedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CommentReportedListener
{
    public function __construct()
    {
        //
    }

    public function handle(CommentReportedEvent $event)
    {
        foreach (User::admins() as $admin) {
            Mail::to($admin->email)->send(new CommentReportedMail($event->comment));
        }
    }
}
