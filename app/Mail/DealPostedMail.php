<?php

namespace App\Mail;

use App\Models\Deal;
use Illuminate\Mail\Mailable;

class DealPostedMail extends Mailable
{
    public $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function build()
    {
        return $this->markdown('emails.deal-posted');
    }
}
