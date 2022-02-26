<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStoreRequest;
use App\Http\Requests\Admin\StoreUpdateRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.store.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        return view('store.create');
    }

    /**
     * @param \App\Http\Requests\Admin\StoreStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request): \Illuminate\Http\Response
    {
        $store = Store::create($request->validated());

        $request->session()->flash('store.id', $store->id);

        return redirect()->route('store.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Store $store): \Illuminate\Http\Response
    {
        return view('store.show', compact('store'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Store $store): \Illuminate\Http\Response
    {
        return view('store.edit', compact('store'));
    }

    /**
     * @param \App\Http\Requests\Admin\StoreUpdateRequest $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, Store $store): \Illuminate\Http\Response
    {
        $store->update($request->validated());

        $request->session()->flash('store.id', $store->id);

        return redirect()->route('store.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Store $store): \Illuminate\Http\Response
    {
        $store->delete();

        return redirect()->route('store.index');
    }
}
