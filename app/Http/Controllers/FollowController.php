<?php

namespace App\Http\Controllers;

use App\Events\UserFollowedEvent;
use App\Models\Follow;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FollowController extends Controller
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function store($id)
    {
        if (Follow::new($id) == true) {
            Alert::toast('You are already following this user', 'warning');
        } else {
            $follow = new Follow();

            $follow->user_id = Auth::id();
            $follow->follow_id = $id;
            $follow->is_active = 1;

            $follow->save();

            if ($follow->user->followers == 1) {
                event(new UserFollowedEvent($follow));
            }

            Alert::toast($follow->follow->displayName() . ' followed.', 'success');
        }

        return redirect()->back();
    }

    /**
     * @param Follow $follow
     * @return RedirectResponse
     */
    public function destroy(Follow $follow)
    {
        $follow->delete();

        Alert::toast($follow->user->displayName() . ' successfully removed!', 'success');

        return redirect()->back();
    }
}
