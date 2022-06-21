<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;

class ApproveDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);
        if ($deal->is_active === false) {
            $deal->is_active = true;
            $deal->update();
            return back()->with('success', 'Deal Approved!');
        }

        $deal->is_active = false;
        $deal->update();
        return back()->with('success', 'Deal Unapproved!');
    }
}
