<?php

namespace App\Http\Controllers;

use App\Models\Bounty;
use RealRashid\SweetAlert\Facades\Alert;

class UnfeatureBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_featured = 0;

        $bounty->update();

        Alert::toast($bounty->title . ' Unfeatured!', 'success');

        return redirect()->back();
    }
}
