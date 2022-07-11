<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Products/Index', [
            'products' => ProductResource::collection(Product::all())
        ]);
    }

    /**
     * @param Request $request
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Products/Create', [
            'brands' => Brand::all(),
        ]);
    }

    /**
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->msrp = $request->msrp;
        $product->brand_id = $request->brand_id;
        $product->is_featured = $request->is_featured;

        $product->save();

        return to_route('admin.product.index')->with('success', $product->name . ' added successfully!');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function show(Request $request, Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * @param Product $product
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        return Inertia::render('Admin/Products/Edit', [
            'brands' => Brand::all(),
            'product' => $product
        ]);
    }

    /**
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->msrp = $request->msrp;
        $product->is_featured = $request->is_featured;

        $product->update();

        return to_route('admin.product.index')->with('success', $product->name . ' updated successfully!');
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('admin.product.index')->with('success', $product->name . ' deleted successfully!');
    }
}
