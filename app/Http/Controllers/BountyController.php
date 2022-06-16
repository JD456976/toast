<?php

namespace App\Http\Controllers;

use App\Http\Requests\BountyStoreRequest;
use App\Http\Requests\BountyUpdateRequest;
use App\Http\Resources\BountyResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReportResource;
use App\Models\Bounty;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Deal;
use App\Models\Files;
use App\Models\Point;
use App\Models\Product;
use App\Models\Report;
use App\Models\Store;
use App\Notifications\BountyFilled;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class BountyController extends Controller
{
    /**
     * @return Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Bounties/Index', [
            'bounties' => BountyResource::collection(Bounty::activeBounties()),
        ]);
    }

    /**
     * @return Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Bounties/Create', [
            'stores' => Store::all(),
            'products' => Product::all(),
            'brands' => Brand::all(),
        ]);
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
            return back()->with('error', "You do not have that many points to award!");
        }

        $bounty->save();
        $bounty->tag($request->tags);

        $images = Files::getImages();

        foreach ($images as $image) {
            $bounty->addMediaFromDisk($image->filepath)->toMediaCollection('bounties');
        }

        Files::deleteImages();

        $point->points = -$request->award;
        $point->user_id = Auth::id();

        $bounty->points()->save($point);

        Auth::user()->reducePoint($request->award);

        return to_route("bounty.index")->with('success', 'Bounty Posted Successfully!');
    }

    /**
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $bounty = Bounty::where('slug', $slug)->first();
        return Inertia::render('Bounties/Show', [
            'comments' => CommentResource::collection(Comment::all()->where('commentable_id', $bounty->id)),
            'bounty' => Bounty::where("slug", $slug)->first()->load('user', 'brand:id,name'),
            'initial' => round(Bounty::where("slug", $slug)->first()->averageRating()),
            'media' => Bounty::where("slug", $slug)->first()->getMedia('bounties'),
            'audits' => Bounty::where("slug", $slug)->first()->audits,
            'reports' => ReportResource::collection(Report::all()->where("parent_slug", $slug)->where('is_resolved', 0)),
            views($bounty)->record()
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
            return back()->with('error', "This Deal does not exist in our system. Please check the URL and re-submit it.");

        }

        $bounty->deal_id = $deal->id;
        $bounty->filled_id = Auth::id();
        $bounty->is_filled = 1;

        $bounty->update();

        $deal->user->notify(new BountyFilled($bounty));

        return redirect()->back()->with('success', "Bounty filled and marked for verification!");
    }
}
