<?php

namespace App\Notifications;

use App\Mail\BountyFilledMail;
use App\Models\Bounty;
use Illuminate\Notifications\Notification;

class BountyFilledNotification extends Notification
{
    public function __construct(Bounty $bounty)
    {
        $this->bounty = $bounty;
    }

    public function via($notifiable): array
    {
        return ['database', 'mail'];
    }

//    public function toDatabase($notifiable): array
//    {
//        return [
//            'bounty_id' => $this->bounty->id,
//        ];
//    }

    public function toMail($notifiable)
    {
        return (new BountyFilledMail())
            ->to($notifiable->email)
            ->subject('Bounty Filled')
            ->markdown('emails.bounty-filled', ['url' => route('bounty.show', $this->bounty->slug)]);
    }

    public function toArray($notifiable): array
    {
        return [
            'bounty_slug' => $this->bounty->slug,
            'some_text' => 'some test',
        ];
    }
}
