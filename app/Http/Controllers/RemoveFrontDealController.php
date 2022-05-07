<?php

namespace App\Http\Controllers;

use App\Models\Deal;

class RemoveFrontDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_frontpage = 0;

        $deal->update();

        return redirect()->back()->with('success', 'Deal removed from showing on frontpage');
    }
}
