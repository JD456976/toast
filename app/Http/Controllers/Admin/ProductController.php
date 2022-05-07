<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('product.create');
    }

    /**
     * @param ProductStoreRequest $request
     * @return Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());

        $request->session()->flash('product.id', $product->id);

        return redirect()->route('product.index');
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
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $brands = Deal::brands();
        return view('admin.product.edit', compact('product', 'brands'));
    }

    /**
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->brand_id = $request->brands;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->msrp = $request->msrp;

        $product->update();

        Alert::toast($product->name . ' updated successfully!', 'success');

        return to_route('admin.product.index');
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Alert::toast($product->name . ' deleted successfully!', 'success');

        return to_route('admin.product.index');
    }
}
