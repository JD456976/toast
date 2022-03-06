<?php

namespace App\Listeners;

use App\Events\DealReportedEvent;
use App\Mail\DealReportedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class DealReportedListener
{
    public function __construct()
    {
        //
    }

    public function handle(DealReportedEvent $event)
    {
        foreach (User::admins() as $admin) {
            Mail::to($admin->email)->send(new DealReportedMail($event->deal));
        }
    }
}
