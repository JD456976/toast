<?php

namespace App\Models\Presenters;

trait UserPresenter
{
    public function displayName()
    {
        return $this->name;
    }

    public function roleName()
    {
        if ($this->roles->contains('name','admin')) {
            return 'admin';
        }
        else {
            return 'moderator';
        }
    }
}
