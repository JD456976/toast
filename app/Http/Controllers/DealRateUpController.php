<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Rating;
use RealRashid\SweetAlert\Facades\Alert;

class DealRateUpController extends Controller
{
    public function __invoke($id)
    {
        if (Rating::Rated($id) == true) {
            Alert::toast('You have already voted for this', 'error');
        } else {
            $deal = Deal::find($id);

            $deal->rateOnce(1);

            Alert::toast('You voted up successfully!', 'success');
        }

        return redirect()->back();
    }
}
