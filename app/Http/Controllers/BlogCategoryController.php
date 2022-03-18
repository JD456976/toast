<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function __invoke($id)
    {
        $blogs = BlogCategory::catPosts($id)->paginate(5);
        $categories = BlogCategory::all();
        $tags = Blog::popularTags();
        $popular = Blog::orderByViews()->get();
        return view('frontend.blog-category.index', compact('blogs', 'categories', 'tags', 'popular'));
    }
}
