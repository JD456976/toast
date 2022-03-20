<?php

namespace App\Http\Controllers;

use App\Events\BountyVerifiedEvent;
use App\Models\Bounty;
use RealRashid\SweetAlert\Facades\Alert;

class VerifyBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_verified = 1;

        $bounty->update();

        event(new BountyVerifiedEvent($bounty));

        Alert::toast($bounty->title . ' Verified!', 'success');

        return redirect()->back();
    }
}
