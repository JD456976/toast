<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryStoreRequest;
use App\Http\Requests\Admin\ProductCategoryUpdateRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class ProductCategoryController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/ProductCategories/Index', [
            'cats' => ProductCategoryResource::collection(ProductCategory::all())
        ]);
    }

    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/ProductCategories/Create', [
            'products' => Product::all(),
        ]);
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

        return to_route('admin.product-category.index')->with('success', $productCategory->name . ' saved successfully!');
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
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(ProductCategory $productCategory)
    {
        return Inertia::render('Admin/ProductCategories/Edit', [
            'category' => $productCategory,
            'products' => Product::all(),
        ]);
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

        return to_route('admin.product-category.index')->with('success', $productCategory->name . ' updated successfully!');
    }

    /**
     * @param ProductCategory $productCategory
     * @return RedirectResponse
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return to_route('admin.product-category.index')->with('success', $productCategory->name . ' deleted successfully!');
    }
}
