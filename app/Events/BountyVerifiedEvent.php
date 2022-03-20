<?php

namespace App\Events;

use App\Models\Bounty;
use Illuminate\Foundation\Events\Dispatchable;

class BountyVerifiedEvent
{
    use Dispatchable;

    public $bounty;

    public function __construct(Bounty $bounty)
    {
        $this->bounty = $bounty;
    }
}
