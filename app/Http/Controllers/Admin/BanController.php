<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserBannedEvent;
use App\Events\UserUnbannedEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class BanController extends Controller
{
    public function store(User $user)
    {
        $user->is_banned = 1;

        $user->save();

        event(new UserBannedEvent($user));

        Alert::toast($user->displayName() . ' is banned', 'warning');

        return redirect()->back();
    }

    public function update(User $user)
    {
        $user->is_banned = 0;

        $user->update();

        event(new UserUnbannedEvent($user));

        Alert::toast($user->displayName() . ' is unbanned', 'success');

        return redirect()->back();
    }
}
