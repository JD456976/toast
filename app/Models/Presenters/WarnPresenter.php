<?php

namespace App\Models\Presenters;

use Carbon\Carbon;

trait WarnPresenter
{
    public function expireDate()
    {
        return Carbon::parse($this->expires)->format('F j, Y');
    }
}
