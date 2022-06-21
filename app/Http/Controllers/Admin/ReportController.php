<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ReportController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Reports/Index', [
            'reports' => ReportResource::collection(Report::all())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Report $report
     * @return Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * @param Report $report
     * @return RedirectResponse
     */
    public function update(Report $report)
    {

        if ($report->reportable_type === Comment::class) {
            $comment = Comment::where('id', $report->reportable_id)->first();
            $comment->is_reported = 0;
            $comment->update();
        }

        $report->is_resolved = 1;

        $report->update();

        return to_route('deal.show', $report->parent_slug)->with('success', 'Report resolved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Report $report
     * @return Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
