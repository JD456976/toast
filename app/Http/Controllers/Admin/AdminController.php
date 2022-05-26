<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BountyResource;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\DealResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReportResource;
use App\Http\Resources\StoreResource;
use App\Http\Resources\UserResource;
use App\Models\Bounty;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Deal;
use App\Models\Product;
use App\Models\Report;
use App\Models\Store;
use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return Inertia::render('Admin/Dashboard/Index', [
            'deals' => DealResource::collection(Deal::all()),
            'bounties' => BountyResource::collection(Bounty::all()),
            'comments' => CommentResource::collection(Comment::all()),
            'reports' => ReportResource::collection(Report::all()),
            'products' => ProductResource::collection(Product::all()),
            'brands' => BrandResource::collection(Brand::all()),
            'stores' => StoreResource::collection(Store::all()),
            'users' => UserResource::collection(User::all()),
        ]);
    }
}
