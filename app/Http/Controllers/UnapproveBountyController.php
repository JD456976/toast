<?php

namespace App\Http\Controllers;

use App\Models\Bounty;

class UnapproveBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_active = 0;

        $bounty->update();

        return redirect()->back()->with('success', $bounty->title . ' Unapproved!');
    }
}
