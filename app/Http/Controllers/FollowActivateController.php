<?php

namespace App\Http\Controllers;

use App\Models\Follow;

class FollowActivateController extends Controller
{
    public function __invoke($id)
    {
        $watchlist = Follow::find($id);

        $watchlist->is_active = 1;

        $watchlist->update();

        return redirect()->back()->with('success', 'Follow Activated');
    }
}
