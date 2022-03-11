<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use RealRashid\SweetAlert\Facades\Alert;

class RemoveFrontDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_frontpage =0;

        $deal->update();

        Alert::toast('Deal removed from the frontpage', 'success');

        return redirect()->back();
    }
}
