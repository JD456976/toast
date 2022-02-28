<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Contracts\Foundation\Application;

class DealController extends Controller
{
    /**
     * @param Deal $deal
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $deal = Deal::where('slug', $slug)->first();
        return view('frontend.deal.show', compact('deal'));
    }
}
