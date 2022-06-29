<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStoreRequest;
use App\Http\Requests\Admin\StoreUpdateRequest;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use RealRashid\SweetAlert\Facades\Alert;

/**
 *
 */
class StoreController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Stores/Index', [
            'stores' => StoreResource::collection(Store::all()),
        ]);
    }

    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/Stores/Create');
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
        $store->is_featured = $request->is_featured;

        $store->save();

        return to_route('admin.store.index')->with('success', 'Store Added Successfully');
    }

    /**
     * @param Store $store
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Store $store)
    {
        return Inertia::render('Admin/Stores/Edit', [
            'store' => $store
        ]);
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
        $store->is_featured = $request->is_featured;

        $store->update();

        return to_route('admin.store.index')->with('success', 'Store successfully updated');
    }

    /**
     * @param Store $store
     * @return RedirectResponse
     */
    public function destroy(Store $store)
    {
        $store->delete();

        Alert::toast($store->name . ' deleted successfully!', 'error');

        return to_route('admin.store.index');
    }
}
