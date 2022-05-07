<?php

namespace App\Http\Controllers;

use App\Models\Bounty;
use App\Models\Rating;
use Illuminate\Http\Request;

class BountyRateController extends Controller
{
    public function __invoke($id, Request $request)
    {
        if (Rating::bountyRated($id)) {
            return redirect()->back()->with('error', 'You already voted for this bounty!');
        }

        $bounty = Bounty::find($id);

        $bounty->rateOnce($request->newRating);

        return redirect()->back()->with('success', 'Thank you for your vote!');
    }
}
