<?php

namespace App\Http\Controllers;

use App\Events\DealPostedEvent;
use App\Http\Requests\DealStoreRequest;
use App\Http\Resources\AuditResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\DealResource;
use App\Http\Resources\ReportResource;
use App\Models\Audit;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Deal;
use App\Models\Point;
use App\Models\Product;
use App\Models\Report;
use App\Models\Store;
use App\Notifications\NewDeal;
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
            'deals' => DealResource::collection(Deal::all()),
            'featured' => DealResource::collection(Deal::featuredDeals()),
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

        $point->points = settings()->get("deal_points");
        $point->user_id = Auth::id();

        $deal->points()->save($point);

        event(new DealPostedEvent($deal));

        if (Deal::followed(Auth::id()) !== null) {
            foreach (Deal::followed(Auth::id()) as $followed) {
                $followed->user->notify(new NewDeal($deal));
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
    public function show($slug)
    {
        $deal = Deal::where('slug', $slug)->first();
        return Inertia::render('Deals/Show', [
            'comments' => CommentResource::collection(Comment::dealComments($deal->id)),
            'deal' => $deal->load('user', 'brand:id,name'),
            'initial' => round(Deal::where("slug", $slug)->first()->averageRating()),
            'media' => $deal->getMedia('deals'),
            'audits' => AuditResource::collection(Audit::dealAudits($deal->id)),
            'reports' => ReportResource::collection(Report::dealReports($slug)),
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
