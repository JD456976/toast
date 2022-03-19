<?php

namespace App\Http\Controllers;

use App\Models\Bounty;
use RealRashid\SweetAlert\Facades\Alert;

class UnapproveBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_active = 0;

        $bounty->update();

        Alert::toast($bounty->title . ' Unapproved!', 'success');

        return redirect()->back();
    }
}
