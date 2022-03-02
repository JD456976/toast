<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class WatchlistActivateController extends Controller
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function __invoke($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->is_active =1;

        $watchlist->update();

        Alert::toast('Watchlist Item Activated', 'success');

        return redirect()->back();
    }
}
