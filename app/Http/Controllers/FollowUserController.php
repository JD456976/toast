<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class FollowUserController extends Controller
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function __invoke($id)
    {
        $follow = Follow::find($id);

        $follow->is_active = 1;

        $follow->update();

        Alert::toast('You are now following ' . $follow->follow->displayName(), 'type');

        return redirect()->back();
    }
}
