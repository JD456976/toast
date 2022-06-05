<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Models\Page;
use Inertia\Inertia;

class PageShowController extends Controller
{
    public function __invoke($slug)
    {
        $page = PageResource::make(Page::showPage($slug));
        return Inertia::render('Page/Show', [
            'page' => $page,
            'media' => $page->getFirstMediaUrl('pages'),
        ]);
    }
}
