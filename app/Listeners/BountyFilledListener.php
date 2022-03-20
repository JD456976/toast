<?php

namespace App\Listeners;

use App\Events\BountyFilledEvent;
use App\Mail\BountyFilledMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class BountyFilledListener
{
    public function __construct()
    {
        //
    }

    public function handle(BountyFilledEvent $event)
    {
        foreach (User::admins() as $admin) {
            Mail::to($admin->email)->send(new BountyFilledMail($event->bounty));
        }
    }
}
