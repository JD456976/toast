<?php

namespace App\Notifications;

use App\Mail\BountyVerifiedMail;
use App\Models\Bounty;
use Illuminate\Notifications\Notification;

class BountyVerifiedNotification extends Notification
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
        return (new BountyVerifiedMail())
            ->to($notifiable->email)
            ->subject("Bounty Verified")
            ->markdown("emails.bounty-verified", [
                "url" => route("bounty.show", $this->bounty->slug),
            ]);
    }

    public function toArray($notifiable): array
    {
        return [
            "slug" => $this->bounty->slug,
            "title" => "Bounty Verified",
            "content" => "The bounty you filled was just verified and points awarded!",
            "item_name" => $this->bounty->item_name,
        ];
    }
}
