<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Index', [
            'user' => Auth::user()->only('name', 'email')
        ]);
    }
}
