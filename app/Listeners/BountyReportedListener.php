<?php

namespace App\Listeners;

use App\Events\BountyReportedEvent;
use App\Mail\BountyReportedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class BountyReportedListener
{
    public function __construct()
    {
        //
    }

    public function handle(BountyReportedEvent $event)
    {
        foreach (User::admins() as $admin) {
            Mail::to($admin->email)->send(new BountyReportedMail($event->bounty));
        }
    }
}
