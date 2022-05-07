<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;

class WatchlistActivateController extends Controller
{
    public function __invoke($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->is_active = 1;

        $watchlist->update();

        return redirect()->back()->with('success', 'Watchlist item activated');
    }
}
