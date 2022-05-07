<?php

namespace App\Http\Controllers;

use App\Events\DealReportedEvent;
use App\Http\Requests\ReportStoreRequest;
use App\Models\Deal;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportDealController extends Controller
{
    public function __invoke(ReportStoreRequest $request, $id)
    {
        if (!empty(Deal::reported($id))) {
            return to_route('deal.show', $request->deal_slug)->with('error', 'Already reported!');
        } else {
            $report = new Report();

            $deal = Deal::where('id', $id)->first();

            $report->reason = $request->reason;
            $report->comment = $request->comment;
            $report->parent_slug = $request->deal_slug;
            $report->user_id = Auth::id();
            $report->is_resolved = 0;

            $deal->reports()->save($report);

            event(new DealReportedEvent($deal));
        }

        return to_route('deal.show', $request->deal_slug)->with('success', 'Reported successfully!');
    }
}
