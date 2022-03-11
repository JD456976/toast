<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use RealRashid\SweetAlert\Facades\Alert;

class UnfeatureDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_featured =0;

        $deal->update();

        Alert::toast($deal->title . ' Unfeatred!', 'success');

        return redirect()->back();
    }
}
