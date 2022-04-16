<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class FollowController extends Controller
{
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
