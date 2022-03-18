<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Mail\Mailable;

class BlogCommentCreatedMail extends Mailable
{
    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function build()
    {
        return $this->markdown('emails.blog-comment-created');
    }
}
