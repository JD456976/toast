<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;

class FeatureDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);
        if ($deal->is_featured === false) {
            $deal->is_featured = true;
            $deal->update();
            return back()->with('success', 'Deal Featured!');
        }

        $deal->is_featured = false;
        $deal->update();
        return back()->with('success', 'Deal Unfeatured!');
    }
}
