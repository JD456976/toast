<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryStoreRequest;
use App\Http\Requests\Admin\StoreCategoryUpdateRequest;
use App\Http\Resources\StoreCategoryResource;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class StoreCategoryController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/StoreCategories/Index', [
            'cats' => StoreCategoryResource::collection(StoreCategory::all())
        ]);
    }

    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/StoreCategories/Create', [
            'stores' => StoreResource::collection(Store::all()),
        ]);
    }

    /**
     * @param StoreCategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryStoreRequest $request)
    {
        StoreCategory::create($request->validated());

        return to_route('admin.store-category.index')->with('success', 'Store Added Successfully');
    }

    /**
     * @param StoreCategory $storeCategory
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(StoreCategory $storeCategory)
    {
        return Inertia::render('Admin/StoreCategories/Edit', [
            'stores' => StoreResource::collection(Store::all()),
            'category' => $storeCategory
        ]);
    }

    /**
     * @param StoreCategoryUpdateRequest $request
     * @param StoreCategory $storeCategory
     * @return RedirectResponse
     */
    public function update(StoreCategoryUpdateRequest $request, StoreCategory $storeCategory)
    {
        $storeCategory->parent_id = $request->parent_id;
        $storeCategory->name = $request->name;
        $storeCategory->description = $request->description;

        $storeCategory->update();

        return to_route('admin.store-category.index')->with('success', 'Store Category Updated Successfully');
    }

    /**
     * @param StoreCategory $storeCategory
     * @return RedirectResponse
     */
    public function destroy(StoreCategory $storeCategory)
    {
        $storeCategory->delete();

        return to_route('admin.store-category.index')->with('success', $storeCategory->name . ' successfully deleted');
    }
}
