<?php

namespace App\Events;

use App\Models\Follow;
use Illuminate\Foundation\Events\Dispatchable;

class UserFollowedEvent
{
    use Dispatchable;

    public $follow;

    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
    }
}
