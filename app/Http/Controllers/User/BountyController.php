<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\BountyResource;
use App\Http\Resources\UserResource;
use App\Models\Bounty;
use App\Models\User;
use Inertia\Inertia;

class BountyController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Bounties/Index', [
            'bounties' => BountyResource::collection(Bounty::userBounties()),
        ]);
    }

    public function show($id)
    {
        return Inertia::render('User/Bounties/Show', [
            'bounties' => BountyResource::collection(Bounty::publicBounties($id)),
            'user' => UserResource::make(User::where('id', $id)->first()),
        ]);
    }
}
