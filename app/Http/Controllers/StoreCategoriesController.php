<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreCategoryResource;
use App\Models\Deal;
use App\Models\StoreCategory;
use Inertia\Inertia;

class StoreCategoriesController extends Controller
{
    public function index()
    {
        return Inertia::render('StoreCategories/Index', [
            'top' => visits(Deal::class)->top(10),
            'topCats' => visits(StoreCategory::class)->top(10),
            'categories' => StoreCategoryResource::collection(StoreCategory::all())
        ]);
    }

    public function show($slug)
    {
        $category = StoreCategoryResource::make(StoreCategory::showCategory($slug));
        $category->visit()->increment();

        return Inertia::render('StoreCategories/Show', [
            'media' => $category->getMedia('store-categories'),
            'views' => $category->visit()->count(),
            'category' => $category
        ]);
    }
}
