<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WarnStoreRequest;
use App\Http\Requests\Admin\WarnUpdateRequest;
use App\Models\Warn;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WarnController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.warn.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('warn.create');
    }

    /**
     * @param \App\Http\Requests\Admin\WarnStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarnStoreRequest $request)
    {
        $warn = Warn::create($request->validated());

        $request->session()->flash('warn.id', $warn->id);

        return redirect()->route('warn.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Warn $warn
     * @return \Illuminate\Http\Response
     */
    public function show(Warn $warn)
    {
        return view('admin.warn.show', compact('warn'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Warn $warn
     * @return \Illuminate\Http\Response
     */
    public function edit(Warn $warn)
    {
        return view('admin.warn.edit', compact('warn'));
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

        Alert::toast('Warning Updated!', 'success');

        return to_route('admin.warn.index');
    }

    /**
     * @param Warn $warn
     * @return RedirectResponse
     */
    public function destroy(Warn $warn)
    {
        $warn->delete();

        Alert::toast('Warning Deleted!', 'error');

        return to_route('admin.warn.index');
    }
}
