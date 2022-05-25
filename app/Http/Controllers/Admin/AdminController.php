<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory|
     * \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return Inertia::render('Admin/Dashboard/Index');
    }
}
