<?php

namespace App\Mail;

use App\Models\Comment;
use Illuminate\Mail\Mailable;

class CommentReportedMail extends Mailable
{
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function build()
    {
        return $this
            ->subject('Comment Reported')
            ->markdown('emails.comment-reported', [
            'url' => route('deal.show', $this->comment->deal->id),
        ]);
    }
}
