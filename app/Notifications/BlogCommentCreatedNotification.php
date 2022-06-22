<?php

namespace App\Notifications;

use App\Mail\BlogCommentCreatedMail;
use App\Models\Blog;
use Illuminate\Notifications\Notification;

class BlogCommentCreatedNotification extends Notification
{
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function via($notifiable): array
    {
        return ["database", "mail"];
    }

    public function toMail($notifiable)
    {
        return (new BlogCommentCreatedMail($this->blog))
            ->to($notifiable->email)
            ->subject("New Blog Comment")
            ->markdown("emails.blog-comment-created", [
                "url" => route("blog.show", $this->blog->slug),
            ]);
    }

    public function toArray($notifiable): array
    {
        return [
            "slug" => $this->blog->slug,
            "title" => "New Blog Comment",
            "content" => "There is a new comment on a blog you posted!",
            "item_name" => $this->blog->title,
        ];
    }
}
