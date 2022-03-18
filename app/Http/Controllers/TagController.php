<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;

class TagController extends Controller
{
    public function __invoke($tag)
    {
        $blogs = Blog::withAllTags($tag)->paginate(5);
        $categories = BlogCategory::all();
        $tags = Blog::popularTags();
        $popular = Blog::orderByViews()->get();
        return view('frontend.tag.index', compact('categories', 'tags', 'popular', 'blogs', 'tag'));
    }
}
