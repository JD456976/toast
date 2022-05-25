<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Http\Resources\BountyResource;
use App\Models\Bounty;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BountyController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Bounties/Index', [
            'bounties' => BountyResource::collection(Bounty::all()->where('user_id', Auth::id())),
        ]);
    }
}
