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
        if (Watchlist::new($id) == false) {

            Alert::toast('You alread have this in your watchlist', 'warning');
        }
        else {
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
     * @param Watchlist $watchlist
     * @return RedirectResponse
     */
    public function destroy(Watchlist $watchlist)
    {
        $watchlist->delete();

        Alert::toast('Watchlist Item Deleted', 'success');

        return redirect()->back();
    }
}
