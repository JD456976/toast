<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryStoreRequest;
use App\Http\Requests\Admin\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.product-category.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.product-category.create');
    }

    /**
     * @param ProductCategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductCategoryStoreRequest $request)
    {
        $productCategory = new ProductCategory();

        $productCategory->parent_id = $request->parent_id;
        $productCategory->name = $request->name;
        $productCategory->description = $request->description;

        $productCategory->save();

        Alert::toast($productCategory->name . ' saved successfully!', 'success');

        return to_route('admin.product-category.index');
    }

    /**
     * @param ProductCategory $productCategory
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show(ProductCategory $productCategory)
    {
        return view('admin.product-category.show', compact('productCategory'));
    }

    /**
     * @param ProductCategory $productCategory
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product-category.edit', compact('productCategory'));
    }

    /**
     * @param ProductCategoryUpdateRequest $request
     * @param ProductCategory $productCategory
     * @return RedirectResponse
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategory $productCategory)
    {
        $productCategory->parent_id = $request->parent_id;
        $productCategory->name = $request->name;
        $productCategory->description = $request->description;

        $productCategory->update();

        Alert::toast($productCategory->name . ' updated successfully!', 'success');

        return to_route('admin.product-category.index');
    }

    /**
     * @param ProductCategory $productCategory
     * @return RedirectResponse
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        Alert::toast($productCategory->name . ' deleted successfully!', 'error');

        return to_route('admin.product-category.index');
    }
}
