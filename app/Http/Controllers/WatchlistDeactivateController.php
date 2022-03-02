<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use RealRashid\SweetAlert\Facades\Alert;

class WatchlistDeactivateController extends Controller
{
    public function __invoke($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->is_active =0;

        $watchlist->update();

        Alert::toast('Watchlist Item Dectivated', 'success');

        return redirect()->back();
    }
}
