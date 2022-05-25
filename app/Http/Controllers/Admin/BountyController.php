<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BountyUpdateRequest;
use App\Http\Resources\BountyResource;
use App\Models\Bounty;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class BountyController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Bounties/Index', [
            'bounties' => BountyResource::collection(Bounty::all())
        ]);
    }

    /**
     * @param Bounty $bounty
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Bounty $bounty)
    {
        return Inertia::render('Admin/Bounties/Edit', [
            'bounty' => $bounty,
            'stores' => Store::all(),
            'brands' => Brand::all(),
            'products' => Product::all(),
            'tags' => $bounty->tagList
        ]);
    }

    /**
     * @param BountyUpdateRequest $request
     * @param Bounty $bounty
     * @return RedirectResponse
     */
    public function update(BountyUpdateRequest $request, Bounty $bounty)
    {
        $bounty->item_name = $request->item_name;
        $bounty->store_id = $request->store_id;
        $bounty->brand_id = $request->brand_id;
        $bounty->product_id = $request->product_id;
        $bounty->item_url = $request->item_url;
        $bounty->description = $request->description;
        $bounty->is_featured = $request->has('is_featured');
        $bounty->is_active = $request->has('is_active');
        $bounty->is_filled = $request->has('is_filled');

        $bounty->update();

        $bounty->retag($request->tags);

        $bounty->addAllMediaFromTokens();

        return to_route('admin.bounty.index')->with('success', ($bounty->item_name . ' Successfully updated!'));
    }

    /**
     * @param Bounty $bounty
     * @return RedirectResponse
     */
    public function destroy(Bounty $bounty)
    {
        $bounty->delete();

        return to_route('admin.bounty.index')->with('success', $bounty->item_name . ' Deleted successfully!');
    }
}
