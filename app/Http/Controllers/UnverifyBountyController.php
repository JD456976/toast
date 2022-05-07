<?php

namespace App\Http\Controllers;

use App\Models\Bounty;

class UnverifyBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_verified = 0;

        $bounty->update();

        return redirect()->back()->with('success', $bounty->title . ' Unverified!');
    }
}
