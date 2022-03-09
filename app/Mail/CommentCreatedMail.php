<?php

namespace App\Mail;

use App\Models\Deal;
use Illuminate\Mail\Mailable;

class CommentCreatedMail extends Mailable
{
    public $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function build()
    {
        return $this
            ->subject('New Deal Comment')
            ->markdown('emails.comment-created', [
                'url' => route('deal.show', $this->deal->slug),
            ]);
    }
}
