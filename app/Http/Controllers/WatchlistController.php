<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;

class WatchlistController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show()
    {


        return view('frontend.watchlist.show');
    }
}
