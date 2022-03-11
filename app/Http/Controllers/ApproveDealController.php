<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use RealRashid\SweetAlert\Facades\Alert;

class ApproveDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_active =1;

        $deal->update();

        Alert::toast($deal->title . ' Approved!', 'success');

        return redirect()->back();
    }
}
