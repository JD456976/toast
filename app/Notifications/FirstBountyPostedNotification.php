<?php

namespace App\Notifications;

use App\Mail\FirstBountyPostedMail;
use App\Models\Bounty;
use Illuminate\Notifications\Notification;

class FirstBountyPostedNotification extends Notification
{
    public function __construct(Bounty $bounty)
    {
        $this->bounty = $bounty;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return FirstBountyPostedMail
     */
    public function toMail($notifiable): FirstBountyPostedMail
    {
        return (new FirstBountyPostedMail($this->bounty))
            ->to($notifiable->email)
            ->subject("First Bounty Posted!")
            ->markdown("emails.first-bounty-posted", [
                "url" => route("bounty.show", $this->bounty->slug),
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            "slug" => $this->bounty->slug,
            "title" => "First Bounty Posted",
            "content" => "Congrats on posting your first bounty!",
            "item_name" => $this->bounty->item_name,
        ];
    }
}
