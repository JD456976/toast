<?php

namespace App\Http\Controllers;

use App\Models\Bounty;
use RealRashid\SweetAlert\Facades\Alert;

class ApproveBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_active = 1;

        $bounty->update();

        Alert::toast($bounty->title . ' Approved!', 'success');

        return redirect()->back();
    }
}
