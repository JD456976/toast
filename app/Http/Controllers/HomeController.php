<?php

namespace App\Http\Controllers;

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
        return view('frontend.home');
    }
}
