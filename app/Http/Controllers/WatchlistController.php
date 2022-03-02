<?php

namespace App\Http\Controllers;

use App\Http\Requests\WatchlistStoreRequest;
use App\Http\Requests\WatchlistUpdateRequest;
use App\Models\Watchlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WatchlistController extends Controller
{
    /**
     * @param \App\Http\Requests\WatchlistStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WatchlistStoreRequest $request): \Illuminate\Http\Response
    {
        $watchlist = Watchlist::create($request->validated());

        $request->session()->flash('watchlist.id', $watchlist->id);

        return redirect()->route('watchlist.index');
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
