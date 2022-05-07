<?php

namespace App\Http\Controllers;

use App\Models\Deal;

class UnapproveDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_active = 0;

        $deal->update();

        return redirect()->back()->with('success', $deal->title . ' Unapproved!');
    }
}
