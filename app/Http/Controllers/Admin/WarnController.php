<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WarnStoreRequest;
use App\Http\Requests\Admin\WarnUpdateRequest;
use App\Models\Warn;
use Illuminate\Http\Request;

class WarnController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $warns = Warn::all();

        return view('warn.index', compact('warns'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        return view('warn.create');
    }

    /**
     * @param \App\Http\Requests\Admin\WarnStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarnStoreRequest $request): \Illuminate\Http\Response
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
    public function show(Request $request, Warn $warn): \Illuminate\Http\Response
    {
        return view('warn.show', compact('warn'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Warn $warn
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Warn $warn): \Illuminate\Http\Response
    {
        return view('warn.edit', compact('warn'));
    }

    /**
     * @param \App\Http\Requests\Admin\WarnUpdateRequest $request
     * @param \App\Models\Warn $warn
     * @return \Illuminate\Http\Response
     */
    public function update(WarnUpdateRequest $request, Warn $warn): \Illuminate\Http\Response
    {
        $warn->update($request->validated());

        $request->session()->flash('warn.id', $warn->id);

        return redirect()->route('warn.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Warn $warn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Warn $warn): \Illuminate\Http\Response
    {
        $warn->delete();

        return redirect()->route('warn.index');
    }
}
