<?php

namespace App\Http\Controllers;

use App\Events\DealReportedEvent;
use App\Http\Requests\ReportStoreRequest;
use App\Models\Deal;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReportStoreController extends Controller
{
    public function __invoke(ReportStoreRequest $request, $id)
    {
        if (Deal::reported($id) == false) {
            Alert::toast('This deal has already been reported', 'info');
        } else {
            $report = new Report();

            $deal = Deal::find($id)->first();

            $report->reason = $request->reason;
            $report->comment = $request->comment;
            $report->user_id = Auth::id();
            $report->is_resolved = 0;

            $deal->reports()->save($report);

            event(new DealReportedEvent($deal));

            Alert::toast($deal->title . 'successfully reported!', 'success');
        }

        return redirect()->back();
    }
}
