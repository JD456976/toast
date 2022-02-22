<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryStoreRequest;
use App\Http\Requests\Admin\StoreCategoryUpdateRequest;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $storeCategories = StoreCategory::all();

        return view('storeCategory.index', compact('storeCategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        return view('storeCategory.create');
    }

    /**
     * @param \App\Http\Requests\Admin\StoreCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryStoreRequest $request): \Illuminate\Http\Response
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
    public function show(Request $request, StoreCategory $storeCategory): \Illuminate\Http\Response
    {
        return view('storeCategory.show', compact('storeCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreCategory $storeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StoreCategory $storeCategory): \Illuminate\Http\Response
    {
        return view('storeCategory.edit', compact('storeCategory'));
    }

    /**
     * @param \App\Http\Requests\Admin\StoreCategoryUpdateRequest $request
     * @param \App\Models\StoreCategory $storeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryUpdateRequest $request, StoreCategory $storeCategory): \Illuminate\Http\Response
    {
        $storeCategory->update($request->validated());

        $request->session()->flash('storeCategory.id', $storeCategory->id);

        return redirect()->route('storeCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreCategory $storeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StoreCategory $storeCategory): \Illuminate\Http\Response
    {
        $storeCategory->delete();

        return redirect()->route('storeCategory.index');
    }
}
