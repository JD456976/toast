<?php

namespace App\Events;

use App\Models\Deal;
use Illuminate\Foundation\Events\Dispatchable;

class CommentCreatedEvent
{
    use Dispatchable;

    public $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }
}
