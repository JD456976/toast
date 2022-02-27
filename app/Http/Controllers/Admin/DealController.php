<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DealStoreRequest;
use App\Http\Requests\Admin\DealUpdateRequest;
use App\Models\Deal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DealController extends Controller
{
    /**
     * @return Application
     * \|\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.deal.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('deal.create');
    }

    /**
     * @param \App\Http\Requests\Admin\DealStoreRequest $request
     * @return Response
     */
    public function store(DealStoreRequest $request)
    {
        $deal = Deal::create($request->validated());

        $request->session()->flash('deal.id', $deal->id);

        return redirect()->route('deal.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Deal $deal
     * @return Response
     */
    public function show(Request $request, Deal $deal)
    {
        return view('deal.show', compact('deal'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Deal $deal
     * @return Response
     */
    public function edit(Request $request, Deal $deal)
    {
        return view('deal.edit', compact('deal'));
    }

    /**
     * @param \App\Http\Requests\Admin\DealUpdateRequest $request
     * @param \App\Models\Deal $deal
     * @return Response
     */
    public function update(DealUpdateRequest $request, Deal $deal)
    {
        $deal->update($request->validated());

        $request->session()->flash('deal.id', $deal->id);

        return redirect()->route('deal.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Deal $deal
     * @return Response
     */
    public function destroy(Request $request, Deal $deal)
    {
        $deal->delete();

        return redirect()->route('deal.index');
    }
}
