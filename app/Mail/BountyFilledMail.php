<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class BountyFilledMail extends Mailable
{
    public function __construct()
    {
    }

    public function build()
    {
        return $this->markdown('emails.bounty-filled');
    }
}
