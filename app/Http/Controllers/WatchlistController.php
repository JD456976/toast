<?php

namespace App\Http\Controllers;

use App\Http\Resources\WatchlistResource;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WatchlistController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Watchlist/Index', [
            'items' => WatchlistResource::collection(Watchlist::userWatchlist()),
        ]);
    }


    public function store($id)
    {
        if (Watchlist::new($id)) {
            return redirect()->back()->with('error', 'You already have this in your watchlist');
        }

        $watchlist = new Watchlist();

        $watchlist->user_id = Auth::id();
        $watchlist->product_id = $id;
        $watchlist->is_active = 1;

        $watchlist->save();
        return redirect()->back()->with('success', 'Item added to your watchlist');
    }

    public function destroy($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->delete();

        return redirect()->back()->with('info', 'Watchlist item deleted successfully');
    }
}
