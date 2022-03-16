<?php

namespace App\Mail;

use App\Models\Bounty;
use Illuminate\Mail\Mailable;

class BountyReportedMail extends Mailable
{
    public $bounty;

    public function __construct(Bounty $bounty)
    {
        $this->bounty = $bounty;
    }

    public function build()
    {
        return $this->markdown('emails.bounty-reported');
    }
}
