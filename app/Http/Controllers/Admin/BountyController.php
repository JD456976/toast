<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BountyUpdateRequest;
use App\Models\Bounty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
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
        return view('admin.bounty.index');
    }

    /**
     * @param Bounty $bounty
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Bounty $bounty)
    {
        $stores = Bounty::stores();
        $products = Bounty::products();
        $brands = Bounty::brands();
        return view('admin.bounty.edit', compact('bounty', 'brands', 'stores', 'products'));
    }

    /**
     * @param BountyUpdateRequest $request
     * @param Bounty $bounty
     * @return RedirectResponse
     */
    public function update(BountyUpdateRequest $request, Bounty $bounty)
    {
        $bounty->user_id = $request->user_id;
        $bounty->item_name = $request->item_name;
        $bounty->store_id = $request->stores;
        $bounty->brand_id = $request->brands;
        $bounty->product_id = $request->products;
        $bounty->item_url = $request->item_url;
        $bounty->description = $request->description;
        $bounty->is_featured = $request->has('is_featured');
        $bounty->is_active = $request->has('is_active');

        $bounty->update();

        $bounty->retag($request->tags);

        $bounty->addAllMediaFromTokens();

        Alert::toast($bounty->item_name . ' Successfully updated!', 'success');

        return to_route('admin.bounty.index');
    }

    /**
     * @param Bounty $bounty
     * @return RedirectResponse
     */
    public function destroy(Bounty $bounty)
    {
        $bounty->delete();

        Alert::toast($bounty->item_name . ' Deleted successfully!', 'error');

        return to_route('admin.bounty.index');
    }
}
