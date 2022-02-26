<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DealStoreRequest;
use App\Http\Requests\Admin\DealUpdateRequest;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $deals = Deal::all();

        return view('deal.index', compact('deals'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('deal.create');
    }

    /**
     * @param \App\Http\Requests\Admin\DealStoreRequest $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Deal $deal)
    {
        return view('deal.show', compact('deal'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Deal $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Deal $deal)
    {
        return view('deal.edit', compact('deal'));
    }

    /**
     * @param \App\Http\Requests\Admin\DealUpdateRequest $request
     * @param \App\Models\Deal $deal
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Deal $deal)
    {
        $deal->delete();

        return redirect()->route('deal.index');
    }
}
