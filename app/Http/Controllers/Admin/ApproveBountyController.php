<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bounty;

class ApproveBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);
        if ($bounty->is_active === false) {
            $bounty->is_active = true;
            $bounty->update();
            return back()->with('success', 'Bounty Approved!');
        }

        $bounty->is_active = false;
        $bounty->update();
        return back()->with('success', 'Bounty Unapproved!');
    }
}
