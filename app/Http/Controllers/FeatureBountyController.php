<?php

namespace App\Http\Controllers;

use App\Models\Bounty;
use RealRashid\SweetAlert\Facades\Alert;

class FeatureBountyController extends Controller
{
    public function __invoke($id)
    {
        $bounty = Bounty::find($id);

        $bounty->is_featured = 1;

        $bounty->update();

        Alert::toast($bounty->title . ' Featured!', 'success');

        return redirect()->back();
    }
}
