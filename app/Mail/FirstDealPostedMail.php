<?php

namespace App\Mail;

use App\Models\Deal;
use Illuminate\Mail\Mailable;

class FirstDealPostedMail extends Mailable
{
    public $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function build()
    {
        return $this
            ->subject('First Deal Posted!')
            ->markdown('emails.first-deal-posted', [
                'url' => route('deal.show', $this->deal->slug),
            ]);
    }
}
