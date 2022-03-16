<?php

namespace App\Http\Controllers;

use App\Events\BountyReportedEvent;
use App\Http\Requests\ReportStoreRequest;
use App\Models\Bounty;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReportBountyController extends Controller
{
    public function __invoke(ReportStoreRequest $request, $id)
    {
        if (!empty(Bounty::reported($id))) {
            Alert::toast('This bounty has already been reported', 'info');
        } else {
            $report = new Report();

            $bounty = Bounty::where('id', $id)->first();

            $report->reason = $request->reason;
            $report->comment = $request->comment;
            $report->user_id = Auth::id();
            $report->is_resolved = 0;

            $bounty->reports()->save($report);

            event(new BountyReportedEvent($bounty));

            Alert::toast($bounty->title . 'successfully reported!', 'success');
        }

        return redirect()->back();
    }
}
