<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Foundation\Events\Dispatchable;

class CommentReportedEvent
{
    use Dispatchable;

    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}
