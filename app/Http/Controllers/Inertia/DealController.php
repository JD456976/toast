<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DealController extends Controller
{
    public function index()
    {
        return Inertia::render('Deals/Index', [
            'deals' => Deal::where('user_id', Auth::id())->get()
        ]);
    }
}
