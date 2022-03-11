<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use RealRashid\SweetAlert\Facades\Alert;

class FeatureDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_featured =1;

        $deal->update();

        Alert::toast($deal->title . ' Featured!', 'success');

        return redirect()->back();
    }
}
