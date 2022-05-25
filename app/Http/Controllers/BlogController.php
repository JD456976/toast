<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CommentResource;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog/Index', [
            'blogs' => BlogResource::collection(Blog::all()->where('is_active', 1)),
            'tags' => Blog::allTags(),
            'views' => views(Blog::class)->count(),
            'cats' => BlogCategoryResource::collection(BlogCategory::all()),
            'popular' => Blog::orderByUniqueViews()->get()
        ]);
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
        $blog = Blog::where('slug', $slug)->first()->load('category:id,title,is_featured', 'user:id,name,slug');
        return Inertia::render('Blog/Show', [
            'comments' => CommentResource::collection(Comment::all()->where('commentable_id', $blog->id)),
            'blog' => $blog,
            'tags' => Blog::allTags(),
            'views' => views(Blog::class)->count(),
            'cats' => BlogCategoryResource::collection(BlogCategory::all()),
            'popular' => Blog::orderByUniqueViews()->get()
        ]);
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
