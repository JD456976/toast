<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.report.index');
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
        $report->is_resolved = 1;

        $report->update();

        return redirect()->back()->with('success', 'Report resolved successfully!', );
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
