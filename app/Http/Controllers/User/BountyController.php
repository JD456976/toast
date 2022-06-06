<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\BountyResource;
use App\Http\Resources\UserResource;
use App\Models\Bounty;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class BountyController extends Controller
{
    /**
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Account/Bounties/Index', [
            'bounties' => BountyResource::collection(Bounty::userBounties()),
        ]);
    }

    /**
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        return Inertia::render('User/Bounties/Show', [
            'bounties' => BountyResource::collection(Bounty::publicBounties($id)),
            'user' => UserResource::make(User::where('id', $id)->first()),
        ]);
    }
}
