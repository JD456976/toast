<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use RealRashid\SweetAlert\Facades\Alert;

class UnapproveDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_active =0;

        $deal->update();

        Alert::toast($deal->title . ' Unapproved!', 'success');

        return redirect()->back();
    }
}
