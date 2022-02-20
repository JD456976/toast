<?php

namespace App\Models\Presenters;

trait UserPresenter
{
    public function displayName()
    {
        return $this->name;
    }
}
