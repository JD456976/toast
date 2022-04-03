<?php

namespace App\Mail;

use App\Models\Follow;
use Illuminate\Mail\Mailable;

class UserFollowedMail extends Mailable
{
    public $follow;

    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
    }

    public function build()
    {
        return $this->markdown('emails.user-followed');
    }
}
