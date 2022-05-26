<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Models\Page;
use Inertia\Inertia;

class PageShowController extends Controller
{
    public function __invoke($slug)
    {
        return Inertia::render('Page/Show', [
            'page' => PageResource::make(Page::showPage($slug)),
        ]);
    }
}
