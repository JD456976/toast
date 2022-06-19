<?php

namespace App\Http\Controllers;

use App\Events\BountyReportedEvent;
use App\Http\Requests\ReportBountyStoreRequest;
use App\Models\Bounty;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReportBountyController extends Controller
{
    public function __invoke(ReportBountyStoreRequest $request, $id)
    {
        if (!empty(Bounty::reported($id))) {
            return back()->with('info', "This bounty has already been reported");
        }

        $report = new Report();

        $bounty = Bounty::where('id', $id)->first();

        $report->reason = $request->report_bounty_reason;
        $report->comment = $request->report_bounty_comment;
        $report->user_id = Auth::id();
        $report->is_resolved = 0;

        $bounty->reports()->save($report);

        event(new BountyReportedEvent($bounty));

        return redirect()->back()->with('success', $bounty->title . 'successfully reported!');
    }
}
