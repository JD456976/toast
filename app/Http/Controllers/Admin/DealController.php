<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DealUpdateRequest;
use App\Models\Deal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class DealController extends Controller
{
    /**
     * @return Application
     * \|\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.deal.index');
    }

    /**
     * @param Deal $deal
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Deal $deal)
    {
        $stores = Deal::stores();
        $brands = Deal::brands();
        $products = Deal::products();

        return view('admin.deal.edit', compact('deal', 'products', 'brands', 'stores'));
    }

    /**
     * @param DealUpdateRequest $request
     * @param Deal $deal
     * @return RedirectResponse
     */
    public function update(DealUpdateRequest $request, Deal $deal)
    {
        $deal->product_id = $request->products;
        $deal->store_id = $request->stores;
        $deal->brand_id = $request->brands;
        $deal->price = $request->price;
        $deal->is_active = $request->has('is_active');
        $deal->is_featured = $request->has('is_featured');
        $deal->is_frontpage = $request->has('is_frontpage');
        $deal->price_extras = $request->price_extras;
        $deal->description = $request->description;
        $deal->link = $request->link;
        $deal->title = $request->title;
        $deal->discount = $request->discount;

        $deal->update();

        $deal->retag($request->tags);

        $deal->addAllMediaFromTokens();

        Alert::toast('Deal updated successfully!', 'success');

        return redirect()->back();
    }

    /**
     * @param Deal $deal
     * @return RedirectResponse
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        Alert::toast('Deal deleted!', 'error');

        return to_route('admin.deal.index');
    }
}
