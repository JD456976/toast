<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WatchlistController extends Controller
{
    public function index()
    {
        return Inertia::render('Watchlist/Index', [
            'active' => Watchlist::where('user_id', Auth::id())->where('is_active', 1)->get()->load('product'),
            'inactive' => Watchlist::where('user_id', Auth::id())->where('is_active', 0)->get()->load('product'),
        ]);
    }

    public function store($id)
    {
        if (Watchlist::new($id) == true) {
            return redirect()->back()->with('error', 'You already have this in your watchlist');
        } else {
            $watchlist = new Watchlist();

            $watchlist->user_id = Auth::id();
            $watchlist->product_id = $id;
            $watchlist->is_active = 1;

            $watchlist->save();
            return redirect()->back()->with('success', 'Item added to your watchlist');
        }
    }

    public function destroy(Watchlist $watchlist)
    {
        $watchlist->delete();

        return redirect()->back()->with('success', 'Watchlist item deleted successfully');
    }
}
