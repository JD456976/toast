<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;

class FrontpageDealController extends Controller
{
    public function __invoke($id)
    {
        $deal = Deal::find($id);
        if ($deal->is_frontpage === false) {
            $deal->is_frontpage = true;
            $deal->update();
            return back()->with('success', 'Deal will show on Frontpage!');
        }

        $deal->is_frontpage = false;
        $deal->update();
        return back()->with('success', 'Deal remoeved from frontpage!!');
    }
}
