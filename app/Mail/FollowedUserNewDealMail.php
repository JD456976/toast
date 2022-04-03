<?php

namespace App\Mail;

use App\Models\Deal;
use Illuminate\Mail\Mailable;

class FollowedUserNewDealMail extends Mailable
{
    public $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function build()
    {
        return $this->markdown('emails.followed-user-new-deal');
    }
}
