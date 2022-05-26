<?php

namespace App\Http\Controllers;

use App\Events\BountyVerifiedEvent;
use App\Models\Bounty;
use App\Models\User;

class VerifyBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_verified = 1;

        $bounty->update();

        $filler = User::where('id', $bounty->filled_id)->first();

        $filler->addPoint($bounty->award);

        event(new BountyVerifiedEvent($bounty));

        return redirect()->back()->with('success', $bounty->title . ' Verified!');
    }
}
