<?php

namespace App\Notifications;

use App\Mail\UserFollowedMail;
use App\Models\Follow;
use Illuminate\Notifications\Notification;

class UserFollowedNotification extends Notification
{
    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
    }

    public function via($notifiable): array
    {
        return ["database", "mail"];
    }

    public function toMail($notifiable)
    {
        return (new UserFollowedMail($this->follow))
            ->to($notifiable->email)
            ->subject("New User Following You")
            ->markdown("emails.user-followed", [
                "url" => route("user.show", $this->follow->user->slug),
            ]);
    }

    public function toArray($notifiable): array
    {
        return [
            "slug" => $this->follow->slug,
            "title" => "New User Following You",
            "content" => "There is a new user followig you!",
            "name" => $this->follow->name,
        ];
    }
}
