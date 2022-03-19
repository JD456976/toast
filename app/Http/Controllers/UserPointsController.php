<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Support\Facades\Auth;

class UserPointsController extends Controller
{
    public function __invoke()
    {
        $points = Point::where('user_id', Auth::id())->get();
        return view('frontend.point.index', compact('points'));
    }
}
