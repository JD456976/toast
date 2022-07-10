<?php

namespace App\Mail;

use App\Models\Bounty;
use Illuminate\Mail\Mailable;

class FirstBountyPostedMail extends Mailable
{
    public $bounty;

    public function __construct(Bounty $bounty)
    {
        $this->bounty = $bounty;
    }

    public function build()
    {
        return $this
            ->subject('First Bounty Posted!')
            ->markdown('emails.first-bounty-posted', [
                'url' => route('bounty.show', $this->bounty->slug),
            ]);
    }
}
