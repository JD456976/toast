<?php

namespace App\Http\Controllers;

use App\Models\Bounty;
use RealRashid\SweetAlert\Facades\Alert;

class UnverifyBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_verified = 0;

        $bounty->update();

        Alert::toast($bounty->title . ' Unverified!', 'success');

        return redirect()->back();
    }
}
