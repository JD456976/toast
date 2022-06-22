<?php

namespace App\Notifications;

use App\Mail\BountyCommentCreatedMail;
use App\Models\Bounty;
use Illuminate\Notifications\Notification;

class BountyCommentCreatedNotification extends Notification
{
    public function __construct(Bounty $bounty)
    {
        $this->bounty = $bounty;
    }

    public function via($notifiable): array
    {
        return ["database", "mail"];
    }

    public function toMail($notifiable)
    {
        return (new BountyCommentCreatedMail($this->bounty))
            ->to($notifiable->email)
            ->subject("New Bounty Comment")
            ->markdown("emails.bounty-comment-created", [
                "url" => route("bounty.show", $this->bounty->slug),
            ]);
    }

    public function toArray($notifiable): array
    {
        return [
            "slug" => $this->bounty->slug,
            "title" => "New Bounty Comment",
            "content" => "There is a new comment on a bounty you posted!",
            "item_name" => $this->bounty->item_name,
        ];
    }
}
