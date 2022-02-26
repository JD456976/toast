<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStoreRequest;
use App\Http\Requests\Admin\StoreUpdateRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function create()
    {
        return view('admin.store.create');
    }

    /**
     * @param \App\Http\Requests\Admin\StoreStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $store = new Store();

        $store->name = $request->name;
        $store->description = $request->description;
        $store->slug = $request->slug;
        $store->is_featured = $request->has('is_featured');

        $store->save();

        Alert::toast($store->name . ' added successfully!', 'success');

        return to_route('admin.store.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Store $store): \Illuminate\Http\Response
    {
        return view('admin.store.show', compact('store'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('admin.store.edit', compact('store'));
    }

    /**
     * @param \App\Http\Requests\Admin\StoreUpdateRequest $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, Store $store)
    {
        $store->name = $request->name;
        $store->description = $request->description;
        $store->slug = $request->slug;
        $store->is_featured = $request->has('is_featured');

        $store->update();

        Alert::toast($store->name . ' updated successfully!', 'success');

        return to_route('admin.store.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Store $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {

        $store->delete();

        Alert::toast($store->name. ' deleted successfully!', 'danger');

        return to_route('admin.store.index');
    }
}
