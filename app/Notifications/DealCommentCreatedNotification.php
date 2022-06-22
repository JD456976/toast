<?php

namespace App\Notifications;

use App\Mail\DealCommentCreatedMail;
use App\Models\Deal;
use Illuminate\Notifications\Notification;

class DealCommentCreatedNotification extends Notification
{
    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function via($notifiable): array
    {
        return ["database", "mail"];
    }

    public function toMail($notifiable)
    {
        return (new DealCommentCreatedMail($this->deal))
            ->to($notifiable->email)
            ->subject("New Deal Comment")
            ->markdown("emails.deal-comment-created", [
                "url" => route("deal.show", $this->deal->slug),
            ]);
    }

    public function toArray($notifiable): array
    {
        return [
            "slug" => $this->deal->slug,
            "title" => "New Deal Comment",
            "content" => "There is a new comment on a deal you posted!",
            "item_name" => $this->deal->title,
        ];
    }
}
