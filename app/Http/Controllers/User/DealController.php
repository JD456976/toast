<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Inertia\Inertia;

class DealController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Deals/Index', [
            'deals' => DealResource::collection(Deal::userDeals()),
        ]);
    }
}
