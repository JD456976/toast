<?php

namespace App\Http\Controllers;

use App\Events\BountyVerifiedEvent;
use App\Models\Bounty;

class VerifyBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_verified = 1;

        $bounty->update();

        event(new BountyVerifiedEvent($bounty));

        return redirect()->back()->with('success', $bounty->title . ' Verified!');
    }
}
