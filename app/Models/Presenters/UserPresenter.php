<?php

namespace App\Models\Presenters;

use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

trait UserPresenter
{
    public function displayName()
    {
        return $this->name;
    }

    public function roleName()
    {
        if ($this->roles->contains('name', 'admin')) {
            return 'admin';
        } else {
            return 'moderator';
        }
    }

    public static function watchlistCount()
    {
        return Watchlist::where('user_id', Auth::id())->count();
    }
}
