<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealStoreRequest;
use App\Models\Deal;
use App\Models\Point;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $stores = Deal::stores();
        $products = Deal::products();
        $brands = Deal::brands();
        return view('frontend.deal.create', compact('stores', 'products', 'brands'));
    }

    /**
     * @param DealStoreRequest $request
     * @return RedirectResponse
     */
    public function store(DealStoreRequest $request)
    {
        $deal = new Deal();
        $point = new Point();

        $deal->product_id = $request->products;
        $deal->store_id = $request->stores;
        $deal->brand_id = $request->brands;
        $deal->user_id = Auth::id();
        $deal->price = $request->price;
        $deal->is_active = 1;
        $deal->is_featured = 0;
        $deal->is_frontpage = 0;
        $deal->price_extras = $request->price_extras;
        $deal->description = $request->description;
        $deal->link = $request->link;
        $deal->title = $request->title;
        $deal->discount = $request->discount;

        $deal->save();

        $deal->tag($request->tags);

        $deal->addAllMediaFromTokens();

        $point->points = settings()->get('deal_points');
        $point->user_id = Auth::id();

        $deal->points()->save($point);

        Alert::toast('Deal Added!', 'success');

        return redirect()->back();
    }

    /**
     * @param $slug
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $deal = Deal::where('slug', $slug)->first();
        return view('frontend.deal.show', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
