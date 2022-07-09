<?php

namespace App\Mail;


use Illuminate\Mail\Mailable;

class BountyVerifiedMail extends Mailable
{


    public function __construct()
    {
    }

    public function build()
    {
        return $this->markdown('emails.bounty-verified');
    }
}
