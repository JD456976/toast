<?php

namespace App\Http\Controllers;

use App\Http\Resources\PointResource;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserPointsController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Account/Points/Index', [
            'point' => PointResource::collection(Point::all()->where('user_id', Auth::id()))
        ]);
    }
}
