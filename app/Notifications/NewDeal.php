<?php

namespace App\Notifications;

use App\Mail\FollowedUserNewDealMail;
use App\Models\Deal;
use Illuminate\Notifications\Notification;

class NewDeal extends Notification
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
        return (new FollowedUserNewDealMail($this->deal))
            ->to($notifiable->email)
            ->subject("New Deal Posted")
            ->markdown("emails.followed-user-new-deal", [
                "url" => route("deal.show", $this->deal->slug),
            ]);
    }

    public function toArray($notifiable): array
    {
        return [
            "slug" => $this->deal->slug,
            "title" => "New Deal Posted",
            "content" => "A new Deal was posted by a user you are following!",
            "item_name" => $this->deal->title,
        ];
    }
}
