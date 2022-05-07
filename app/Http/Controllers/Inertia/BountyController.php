<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Bounty;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BountyController extends Controller
{
    public function index()
    {
        return Inertia::render('Bounties/Index', [
            'bounties' => Bounty::where('user_id', Auth::id())->get()
        ]);
    }
}
