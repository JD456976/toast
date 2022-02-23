<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryStoreRequest;
use App\Http\Requests\Admin\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $productCategories = ProductCategory::all();

        return view('productCategory.index', compact('productCategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        return view('productCategory.create');
    }

    /**
     * @param \App\Http\Requests\Admin\ProductCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryStoreRequest $request): \Illuminate\Http\Response
    {
        $productCategory = ProductCategory::create($request->validated());

        $request->session()->flash('productCategory.id', $productCategory->id);

        return redirect()->route('productCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductCategory $productCategory): \Illuminate\Http\Response
    {
        return view('productCategory.show', compact('productCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProductCategory $productCategory): \Illuminate\Http\Response
    {
        return view('productCategory.edit', compact('productCategory'));
    }

    /**
     * @param \App\Http\Requests\Admin\ProductCategoryUpdateRequest $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategory $productCategory): \Illuminate\Http\Response
    {
        $productCategory->update($request->validated());

        $request->session()->flash('productCategory.id', $productCategory->id);

        return redirect()->route('productCategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductCategory $productCategory): \Illuminate\Http\Response
    {
        $productCategory->delete();

        return redirect()->route('productCategory.index');
    }
}
