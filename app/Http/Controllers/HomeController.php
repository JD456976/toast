<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Contracts\Foundation\Application;

class HomeController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $deals = Deal::frontpage();
        return view('frontend.home.index', compact('deals'));
    }
}
