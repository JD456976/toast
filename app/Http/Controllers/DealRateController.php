<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Rating;
use Illuminate\Http\Request;

class DealRateController extends Controller
{
    public function __invoke($id, Request $request)
    {
        if (Rating::dealRated($id)) {
            return redirect()->back()->with('error', 'You have already voted for this deal!');
        }

        $deal = Deal::find($id);

        $deal->rateOnce($request->newRating);

        return redirect()->back()->with('success', 'Thank you for your vote!');
    }
}
