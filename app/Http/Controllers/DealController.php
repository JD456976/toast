<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealStoreRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\DealResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReportResource;
use App\Http\Resources\RevisionResource;
use App\Http\Resources\StoreResource;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Deal;
use App\Models\Files;
use App\Models\Point;
use App\Models\Product;
use App\Models\Report;
use App\Models\Revision;
use App\Models\Store;
use App\Models\View;
use App\Notifications\FirstDealPostedNotification;
use App\Notifications\NewDealPostedNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Deals/Index', [
            'deals' => DealResource::collection(Deal::activeDeals()),
            'top' => visits(Deal::class)->top(10),
            'stores' => StoreResource::collection(Store::all()),
            'brands' => BrandResource::collection(Brand::all()),
            'products' => ProductResource::collection(Product::all()),
            'settings' => settings()->all(),
            'viewed' => View::dealViews(),
        ]);
    }

    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Deals/Create', [
            'stores' => Store::all(),
            'products' => Product::all(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * @param DealStoreRequest $request
     * @return RedirectResponse
     */
    public function store(DealStoreRequest $request)
    {
        $deal = new Deal();
        $point = new Point();

        $deal->product_id = $request->product;
        $deal->store_id = $request->store;
        $deal->brand_id = $request->brand;
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

        if (Deal::userDeals()->count() === 1) {
            Auth::user()->notify(new FirstDealPostedNotification($deal));
        }

        $deal->tag($request->tags);

        $images = Files::getImages();

        foreach ($images as $image) {
            $deal->addMediaFromDisk($image->filepath)->toMediaCollection('deals');
        }

        Files::deleteImages();

        $point->points = settings()->get("deal_points");
        $point->user_id = Auth::id();

        $deal->points()->save($point);

        if (Deal::followed(Auth::id()) !== null) {
            foreach (Deal::followed(Auth::id()) as $followed) {
                $followed->user->notify(new NewDealPostedNotification($deal));
            }
        }

        return to_route('deal.index')->with('success', 'Deal Posted Successfully!');
    }

    /**
     * @param $slug
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show($slug, Request $request)
    {
        $deal = DealResource::make(Deal::showDeal($slug));

        if ((View::dealViewExists($deal->id)) === null) {
            $view = new View();
            $view->user_id = Auth::id();
            $deal->views()->save($view);
        }

        $deal->visit()->increment();
        return Inertia::render('Deals/Show', [
            'comments' => CommentResource::collection(Comment::dealComments($deal->id)),
            'deal' => $deal->load('user', 'brand:id,name', 'watchlist'),
            'initial' => round(Deal::where("slug", $slug)->first()->averageRating()),
            'media' => $deal->getMedia('deals'),
            'audits' => RevisionResource::collection(Revision::dealRevisions()),
            'reports' => ReportResource::collection(Report::dealReports($slug)),
            'views' => $deal->visit()->count()
        ]);
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
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
