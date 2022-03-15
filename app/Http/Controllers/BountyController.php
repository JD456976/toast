<?php

namespace App\Http\Controllers;

use App\Http\Requests\BountyStoreRequest;
use App\Http\Requests\BountyUpdateRequest;
use App\Models\Bounty;
use Illuminate\Http\Request;

class BountyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $bounties = Bounty::all();

        return view('bounty.index', compact('bounties'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        return view('bounty.create');
    }

    /**
     * @param \App\Http\Requests\BountyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BountyStoreRequest $request): \Illuminate\Http\Response
    {
        $bounty = Bounty::create($request->validated());

        $request->session()->flash('bounty.id', $bounty->id);

        return redirect()->route('bounty.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bounty $bounty
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Bounty $bounty): \Illuminate\Http\Response
    {
        return view('bounty.show', compact('bounty'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bounty $bounty
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Bounty $bounty): \Illuminate\Http\Response
    {
        return view('bounty.edit', compact('bounty'));
    }

    /**
     * @param \App\Http\Requests\BountyUpdateRequest $request
     * @param \App\Models\Bounty $bounty
     * @return \Illuminate\Http\Response
     */
    public function update(BountyUpdateRequest $request, Bounty $bounty): \Illuminate\Http\Response
    {
        $bounty->update($request->validated());

        $request->session()->flash('bounty.id', $bounty->id);

        return redirect()->route('bounty.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bounty $bounty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bounty $bounty): \Illuminate\Http\Response
    {
        $bounty->delete();

        return redirect()->route('bounty.index');
    }
}
