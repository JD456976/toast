<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WarnStoreRequest;
use App\Http\Requests\Admin\WarnUpdateRequest;
use App\Http\Resources\WarnResource;
use App\Models\Warn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use RealRashid\SweetAlert\Facades\Alert;

class WarnController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Warnings/Index', [
            'warns' => WarnResource::collection(Warn::all())
        ]);
    }

    /**
     * @param WarnStoreRequest $request
     * @return RedirectResponse
     */
    public function store(WarnStoreRequest $request)
    {
        $warn = new Warn();

        $warn->staff_id = Auth::id();
        $warn->user_id = $request->user_id;
        $warn->reason = $request->warn_user_reason;
        $warn->content = $request->warn_user_comment;
        $warn->expires = $request->expires;

        return to_route('admin.warn.index')->with('success', 'Warn Issued Successfully');
    }

    /**
     * @param Warn $warn
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Warn $warn)
    {
        return Inertia::render('Admin/Warnings/Edit', [
            'warn' => WarnResource::make(Warn::showWarn($warn->id)->first()),
        ]);
    }

    /**
     * @param WarnUpdateRequest $request
     * @param Warn $warn
     * @return RedirectResponse
     */
    public function update(WarnUpdateRequest $request, Warn $warn)
    {
        $warn->reason = $request->reason;
        $warn->content = $request->content;
        $warn->expires = $request->expires;
        $warn->staff_id = Auth::user()->id;

        $warn->update();

        return to_route('admin.warn.index')->with('success', 'Warn updated successfully');
    }

    /**
     * @param Warn $warn
     * @return RedirectResponse
     */
    public function destroy(Warn $warn)
    {
        $warn->delete();

        return to_route('admin.warn.index')->with('success', 'Warn deleted successfully');
    }
}
