<?php

namespace App\Notifications;

use App\Mail\FirstDealPostedMail;
use App\Models\Deal;
use Illuminate\Notifications\Notification;

class FirstDealPostedNotification extends Notification
{
    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ["database", "mail"];
    }


    public function toMail($notifiable): FirstDealPostedMail
    {
        return (new FirstDealPostedMail($this->deal))
            ->to($notifiable->email)
            ->subject("First Deal Posted!")
            ->markdown("emails.deal-comment-created", [
                "url" => route("deal.show", $this->deal->slug),
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
            "slug" => $this->deal->slug,
            "title" => "First Deal Posted",
            "content" => "Congrats on posting your first deal!",
            "item_name" => $this->deal->title,
        ];
    }
}
