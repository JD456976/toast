<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use RealRashid\SweetAlert\Facades\Alert;

class ShowFrontDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_frontpage =1;

        $deal->update();

        Alert::toast('Will now show on the frontpage', 'success');

        return redirect()->back();
    }
}
