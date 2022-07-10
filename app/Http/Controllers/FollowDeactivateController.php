<?php

namespace App\Http\Controllers;

use App\Models\Follow;

class FollowDeactivateController extends Controller
{
    public function __invoke($id)
    {
        $watchlist = Follow::find($id);

        $watchlist->is_active = 0;

        $watchlist->update();

        return redirect()->back()->with('success', 'Follow Deactivated');
    }
}
