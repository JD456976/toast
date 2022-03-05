<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;

class AdminController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('admin.dashboard');
    }
}
