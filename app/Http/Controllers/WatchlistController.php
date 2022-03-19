<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WatchlistController extends Controller
{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function store($id)
    {
        if (Watchlist::new($id) == true) {
            Alert::toast('You already have this in your watchlist', 'warning');
        } else {
            $watchlist = new Watchlist();

            $watchlist->user_id = Auth::id();
            $watchlist->product_id = $id;
            $watchlist->is_active = 1;

            $watchlist->save();

            Alert::toast('Item added to your watchlist!', 'success');
        }
        return redirect()->back();
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $active = Watchlist::active();
        $inactive = Watchlist::inactive();

        return view('frontend.watchlist.show', compact('active', 'inactive'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->delete();

        Alert::toast('Watchlist Item Deleted', 'success');

        return redirect()->back();
    }
}
