<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageShowController extends Controller
{
    public function __invoke($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('frontend.page.show', compact('page'));
    }
}
