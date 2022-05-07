<?php

namespace App\Http\Controllers;

use App\Models\Deal;

class ShowFrontDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_frontpage = 1;

        $deal->update();

        return redirect()->back()->with('success', 'Will now show on the frontpage');
    }
}
