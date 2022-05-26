<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\BountyResource;
use App\Models\Bounty;
use Inertia\Inertia;

class BountyController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Bounties/Index', [
            'bounties' => BountyResource::collection(Bounty::userBounties()),
        ]);
    }
}
