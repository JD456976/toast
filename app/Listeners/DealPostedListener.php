<?php

namespace App\Listeners;

use App\Events\DealPostedEvent;
use App\Mail\DealPostedMail;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Mail;

class DealPostedListener
{
    public function __construct()
    {
        //
    }

    /**
     * @param DealPostedEvent $event
     * @return void
     * Send email to owner of watchlist item
     */
    public function handle(DealPostedEvent $event)
    {
        $item = Watchlist::where('product_id', $event->deal->product_id)->first();

        if (isset($item)) {
            Mail::to($item->user->email)->send(new DealPostedMail($event->deal));
        }
    }
}
