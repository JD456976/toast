<?php

namespace App\Events;

use App\Models\Bounty;
use Illuminate\Foundation\Events\Dispatchable;

class BountyCommentCreatedEvent
{
    use Dispatchable;

    public $bounty;

    public function __construct(Bounty $bounty)
    {
        $this->bounty = $bounty;
    }
}
