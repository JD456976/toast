<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandStoreRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * |\Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.brand.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * @param BrandStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand();

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->slug = $request->slug;
        $brand->is_featured = $request->has('is_featured');

        $brand->save();

        Alert::toast($brand->name . ' added successfully!', 'success');

        return to_route('admin.brand.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Brand $brand)
    {
        return view('brand.show', compact('brand'));
    }

    /**
     * @param Brand $brand
     * @return \Illuminate\Contracts\Foundation\Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * @param BrandUpdateRequest $request
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->slug = $request->slug;
        $brand->is_featured = $request->has('is_featured');

        $brand->update();

        Alert::toast($brand->name . ' updated successfully!', 'success');

        return to_route('admin.brand.index');
    }

    /**
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        Alert::toast($brand->name . ' deleted successfully!', 'danger');

        return to_route('admin.brand.index');
    }
}
