<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryStoreRequest;
use App\Http\Requests\Admin\StoreCategoryUpdateRequest;
use App\Models\StoreCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class StoreCategoryController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.store-category.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.store-category.create');
    }

    /**
     * @param StoreCategoryStoreRequest $request
     * @return Response
     */
    public function store(StoreCategoryStoreRequest $request)
    {
        $storeCategory = StoreCategory::create($request->validated());

        $request->session()->flash('storeCategory.id', $storeCategory->id);

        return redirect()->route('storeCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreCategory $storeCategory
     * @return Response
     */
    public function show(Request $request, StoreCategory $storeCategory)
    {
        return view('storeCategory.show', compact('storeCategory'));
    }

    /**
     * @param StoreCategory $storeCategory
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(StoreCategory $storeCategory)
    {
        return view('admin.store-category.edit', compact('storeCategory'));
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

        Alert::toast($storeCategory->name . ' updated successfully!', 'success');

        return to_route('admin.store-category.index');
    }

    /**
     * @param StoreCategory $storeCategory
     * @return RedirectResponse
     */
    public function destroy(StoreCategory $storeCategory)
    {
        $storeCategory->delete();

        Alert::toast($storeCategory->name . ' deleted!', 'error');

        return to_route('admin.store-category.index');
    }
}
