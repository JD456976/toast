<?php

namespace App\Mail;

use App\Models\Deal;
use Illuminate\Mail\Mailable;

class DealReportedMail extends Mailable
{
    public $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function build()
    {
        return $this
            ->subject('Deal Reported')
            ->markdown('emails.deal-reported', [
            'url' => route('deal.show', $this->deal->id),
        ]);
    }
}
