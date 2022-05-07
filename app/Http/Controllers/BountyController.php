<?php

namespace App\Http\Controllers;

use App\Http\Requests\BountyStoreRequest;
use App\Http\Requests\BountyUpdateRequest;
use App\Models\Bounty;
use App\Models\Deal;
use App\Models\Point;
use App\Notifications\BountyFilled;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
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
        return view("frontend.bounty.index", compact("featured"));
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
        return view(
            "frontend.bounty.create",
            compact("stores", "products", "brands")
        );
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
            Alert::toast("You do not have that many points to award!", "error");
            return back();
        } else {
            $bounty->save();
            $bounty->tag($request->tags);

            $bounty->addAllMediaFromTokens();

            $point->points = -$request->award;
            $point->user_id = Auth::id();

            $bounty->points()->save($point);

            Alert::toast("Bounty Added!", "success");
        }
        return to_route("bounty.index");
    }

    /**
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        return Inertia::render('Bounties/Show', [
            'bounty' => Bounty::where("slug", $slug)->first()->load('comments.user:id,name', 'user', 'brand:id,name', 'reports.user'),
            'initial' => round(Bounty::where("slug", $slug)->first()->averageRating()),
            'media' => Bounty::where("slug", $slug)->first()->getMedia('bounties'),
            'audits' => Bounty::where("slug", $slug)->first()->audits,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(BountyUpdateRequest $request, Bounty $bounty)
    {
        $deal = Deal::where(
            "slug",
            Str::of($request->deal_id)->after("deal/")
        )->first();
        if (empty($deal)) {
            Alert::toast(
                "This Deal does not exist in our system. Please check the URL and re-submit it.",
                "error"
            );
        } else {
            $bounty->deal_id = $deal->id;
            $bounty->filled_id = Auth::id();
            $bounty->is_filled = 1;

            $bounty->update();

            $deal->user->notify(new BountyFilled($bounty));

            Alert::toast(
                "Bounty filled and marked for verification!",
                "success"
            );
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
