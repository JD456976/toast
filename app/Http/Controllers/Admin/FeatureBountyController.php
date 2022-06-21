<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bounty;

class FeatureBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);
        if ($bounty->is_featured === false) {
            $bounty->is_featured = true;
            $bounty->update();
            return back()->with('success', 'Bounty Featured!');
        }

        $bounty->is_featured = false;
        $bounty->update();
        return back()->with('success', 'Bounty Unfeatured!');
    }
}
