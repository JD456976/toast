<?php

namespace App\Events;

use App\Models\Blog;
use Illuminate\Foundation\Events\Dispatchable;

class BlogCommentCreatedEvent
{
    use Dispatchable;

    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
}
