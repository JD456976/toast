<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReportRequest;
use App\Http\Requests\Admin\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Contracts\Foundation\Application;
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
     * Update the specified resource in storage.
     *
     * @param UpdateReportRequest $request
     * @param Report $report
     * @return Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
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
