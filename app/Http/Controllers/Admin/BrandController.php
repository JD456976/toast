<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandStoreRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Brands/Index', [
           'brands' => BrandResource::collection(Brand::all())
        ]);
    }

    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/Brands/Create');
    }

    /**
     * @param BrandStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand();

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->is_featured = $request->has('is_featured');

        $brand->save();

        return to_route('admin.brand.index')->with('success', $brand->name . ' added successfully!');
    }

    /**
     * @param Brand $brand
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Brand $brand)
    {
        return Inertia::render('Admin/Brands/Edit', [
            'brand' => $brand
        ]);
    }

    /**
     * @param BrandUpdateRequest $request
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->is_featured = $request->has('is_featured');

        $brand->update();

        return to_route('admin.brand.index')->with('success', $brand->name . ' updated successfully!');
    }

    /**
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return to_route('admin.brand.index')->with('success', $brand->name . ' deleted successfully!');
    }
}
