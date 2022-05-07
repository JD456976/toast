<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;

class WatchlistDeactivateController extends Controller
{
    public function __invoke($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->is_active = 0;

        $watchlist->update();

        return redirect()->back()->with('success', 'Watchlist item deactivated');
    }
}
