<?php

namespace App\Http\Controllers;

use App\Http\Resources\PointResource;
use App\Models\Point;
use Inertia\Inertia;

class UserPointsController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Account/Points/Index', [
            'point' => PointResource::collection(Point::userPoints())
        ]);
    }
}
