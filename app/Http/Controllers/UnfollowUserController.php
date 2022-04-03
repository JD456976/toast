<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use RealRashid\SweetAlert\Facades\Alert;

class UnfollowUserController extends Controller
{
    public function __invoke($id)
    {
        $follow = Follow::find($id);

        $follow->is_active = 0;

        $follow->update();

        Alert::toast('You are no longer following ' . $follow->follow->displayName(), 'type');

        return redirect()->back();
    }
}
