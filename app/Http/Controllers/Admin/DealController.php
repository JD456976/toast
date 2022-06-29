<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DealUpdateRequest;
use App\Http\Resources\DealResource;
use App\Models\Brand;
use App\Models\Deal;
use App\Models\Files;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Sopamo\LaravelFilepond\Filepond;

class DealController extends Controller
{
    /**
     * @return \Inertia\Response
     * \|\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Deals/Index', [
            'deals' => DealResource::collection(Deal::all())
        ]);
    }

    /**
     * @param Deal $deal
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Deal $deal)
    {
        return Inertia::render('Admin/Deals/Edit', [
            'deal' => $deal,
            'media' => $deal->getMedia('deals')->pluck('original_url'),
            'stores' => Store::all(),
            'brands' => Brand::all(),
            'products' => Product::all(),
            'tags' => $deal->tagArray,
        ]);
    }

    /**
     * @param DealUpdateRequest $request
     * @param Deal $deal
     * @return RedirectResponse
     */
    public function update(DealUpdateRequest $request, Deal $deal)
    {
        $deal->product_id = $request->product_id;
        $deal->store_id = $request->store_id;
        $deal->brand_id = $request->brand_id;
        $deal->price = $request->price;
        $deal->is_active = $request->is_active;
        $deal->is_featured = $request->is_featured;
        $deal->is_frontpage = $request->is_frontpage;
        $deal->price_extras = $request->price_extras;
        $deal->description = $request->description;
        $deal->link = $request->link;
        $deal->title = $request->title;
        $deal->discount = $request->discount;

        $deal->update();

        $deal->clearMediaCollection('deals');

        $images = Files::getImages();

        foreach ($images as $image) {
            $deal->addMediaFromDisk($image->filepath)->toMediaCollection('deals');
        }

        Files::deleteImages();

        $deal->retag($request->tags);

        return to_route('admin.deal.index')->with('success', $deal->title . ' updated successfully');
    }

    /**
     * @param Deal $deal
     * @return RedirectResponse
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        return to_route('admin.deal.index')->with('success', 'Deal Deleted Successfully');
    }
}
