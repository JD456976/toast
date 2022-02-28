<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStoreRequest;
use App\Http\Requests\Admin\StoreUpdateRequest;
use App\Models\Store;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

/**
 *
 */
class StoreController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.store.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.store.create');
    }

    /**
     * @param StoreStoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStoreRequest $request)
    {
        $store = new Store();

        $store->name = $request->name;
        $store->description = $request->description;
        $store->is_featured = $request->has('is_featured');

        $store->save();

        Alert::toast($store->name . ' added successfully!', 'success');

        return to_route('admin.store.index');
    }

    /**
     * @param Request $request
     * @param Store $store
     * @return Application
     * |\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Store $store)
    {
        return view('admin.store.show', compact('store'));
    }

    /**
     * @param Store $store
     * @return Application
     * |\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Store $store)
    {
        return view('admin.store.edit', compact('store'));
    }

    /**
     * @param StoreUpdateRequest $request
     * @param Store $store
     * @return RedirectResponse
     */
    public function update(StoreUpdateRequest $request, Store $store)
    {
        $store->name = $request->name;
        $store->description = $request->description;
        $store->is_featured = $request->has('is_featured');

        $store->update();

        Alert::toast($store->name . ' updated successfully!', 'success');

        return to_route('admin.store.index');
    }

    /**
     * @param Store $store
     * @return RedirectResponse
     */
    public function destroy(Store $store)
    {
        $store->delete();

        Alert::toast($store->name. ' deleted successfully!', 'error');

        return to_route('admin.store.index');
    }
}
