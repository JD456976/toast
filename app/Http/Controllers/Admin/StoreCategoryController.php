<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryStoreRequest;
use App\Http\Requests\Admin\StoreCategoryUpdateRequest;
use App\Models\StoreCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StoreCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.store-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store-category.create');
    }

    /**
     * @param \App\Http\Requests\Admin\StoreCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StoreCategory $storeCategory)
    {
        return view('storeCategory.show', compact('storeCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreCategory $storeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreCategory $storeCategory)
    {
        return view('admin.store-category.edit', compact('storeCategory'));
    }

    /**
     * @param \App\Http\Requests\Admin\StoreCategoryUpdateRequest $request
     * @param \App\Models\StoreCategory $storeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryUpdateRequest $request, StoreCategory $storeCategory)
    {
       $storeCategory->parent_id = $request->parent_id;
       $storeCategory->name = $request->name;
       $storeCategory->description = $request->description;
       $storeCategory->slug = $request->slug;

       $storeCategory->update();

        Alert::toast($storeCategory->name . ' updated successfully!', 'success');

        return to_route('admin.store-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreCategory $storeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreCategory $storeCategory)
    {
        $storeCategory->delete();

        Alert::toast($storeCategory->name . ' deleted!', 'danger');

        return to_route('admin.store-category.index');
    }
}
