<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DealController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Deals/Index', [
            'deals' => DealResource::collection(Deal::all()->where('user_id', Auth::id())),
        ]);
    }
}
