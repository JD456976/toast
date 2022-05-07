<?php

namespace App\Http\Controllers;

use App\Models\Deal;

class UnfeatureDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);

        $deal->is_featured = 0;

        $deal->update();

        return redirect()->back()->with('success', $deal->title . ' Unfeatured!');
    }
}
