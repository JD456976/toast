<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $allTags = Blog::allTags();
        $blogs = Blog::activePosts()->paginate(5);
        $categories = BlogCategory::all();
        $tags = Blog::popularTags();
        $popular = Blog::orderByViews()->get();
        return view('frontend.blog.index', compact('blogs', 'categories', 'tags', 'popular', 'allTags'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $categories = BlogCategory::all();
        $blog = Blog::where('slug', $slug)->first();
        views($blog)->cooldown(30)->record();
        $tags = Blog::popularTags();
        $popular = Blog::orderByViews()->get();
        return view('frontend.blog.show', compact('blog', 'categories', 'tags', 'popular'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Blog $blog)
    {
        //
    }
}
