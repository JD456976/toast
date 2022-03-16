<?php

namespace App\Http\Controllers;

use App\Http\Requests\BountyStoreRequest;
use App\Models\Bounty;
use App\Models\Point;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BountyController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $featured = Bounty::featured();
        return view('frontend.bounty.index', compact('featured'));
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $stores = Bounty::stores();
        $brands = Bounty::brands();
        $products = Bounty::products();
        return view('frontend.bounty.create', compact('stores', 'products', 'brands'));
    }

    /**
     * @param BountyStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BountyStoreRequest $request)
    {
        $bounty = new Bounty();
        $point = new Point();

        $bounty->user_id = Auth::id();
        $bounty->item_name = $request->item_name;
        $bounty->item_url = $request->item_url;
        $bounty->store_id = $request->stores;
        $bounty->product_id = $request->products;
        $bounty->brand_id = $request->brands;
        $bounty->description = $request->description;
        $bounty->award = $request->award;

        if (Auth::user()->getPoints() < $request->award) {
            Alert::toast('You do not have that many points to award!', 'error');
            return back();
        } else {
            $bounty->save();
            $bounty->tag($request->tags);

            $bounty->addAllMediaFromTokens();

            $point->points = (-$request->award);
            $point->user_id = Auth::id();

            $bounty->points()->save($point);

            Alert::toast('Bounty Added!', 'success');
        }
        return to_route('bounty.index');
    }

    /**
     * @param Bounty $bounty
     * @return Application
     * \|\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $bounty = Bounty::where('slug', $id)->first();
        return view('frontend.bounty.show', compact('bounty'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
