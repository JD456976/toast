<?php

namespace App\Http\Controllers;

use App\Models\Bounty;
use App\Models\Rating;
use RealRashid\SweetAlert\Facades\Alert;

class BountyRateDownController extends Controller
{
    public function __invoke($id)
    {
        if (Rating::Rated($id) == true) {
            Alert::toast('You have already voted for this', 'error');
        } else {
            $bounty = Bounty::find($id);

            $bounty->rateOnce(-1);

            Alert::toast('You voted up successfully!', 'success');
        }

        return redirect()->back();
    }
}
