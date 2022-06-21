<?php

namespace App\Http\Controllers\Admin;

use App\Events\BountyVerifiedEvent;
use App\Http\Controllers\Controller;
use App\Models\Bounty;
use App\Models\Point;
use App\Models\User;

class VerifyBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);
        if ($bounty->is_verified === false) {
            $bounty->is_verified = true;
            $bounty->update();

            $filler = User::where('id', $bounty->filled_id)->first();

            $point = new Point();
            $point->points = $bounty->award;
            $point->user_id = $filler->id;

            $bounty->points()->save($point);

            event(new BountyVerifiedEvent($bounty));

            return back()->with('success', $bounty->item_name . ' Verified!');
        }

        $bounty->is_verified = false;
        $bounty->update();

        $filler = User::where('id', $bounty->filled_id)->first();

        $point = new Point();
        $point->points = -$bounty->award;
        $point->user_id = $filler->id;

        $bounty->points()->save($point);

        return back()->with('success', $bounty->item_name . ' Unverified!');
    }
}
