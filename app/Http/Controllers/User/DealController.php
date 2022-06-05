<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealResource;
use App\Http\Resources\UserResource;
use App\Models\Deal;
use App\Models\User;
use Inertia\Inertia;

class DealController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Deals/Index', [
            'deals' => DealResource::collection(Deal::userDeals()),
        ]);
    }

    public function show($id)
    {
        return Inertia::render('User/Deals/Show', [
            'deals' => DealResource::collection(Deal::publicDeals($id)),
            'user' => UserResource::make(User::where('id', $id)->first()),
        ]);
    }
}
