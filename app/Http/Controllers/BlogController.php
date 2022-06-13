<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CommentResource;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog/Index', [
            'blogs' => BlogResource::collection(Blog::activePosts()),
            'tags' => Blog::allTags(),
            'cats' => BlogCategoryResource::collection(BlogCategory::all()),
            'popular' => visits(Blog::class)->top(10),
        ]);
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first()->load('category:id,title,is_featured', 'user:id,name,slug');
        return Inertia::render('Blog/Show', [
            'comments' => CommentResource::collection(Comment::blogComments($blog->id)),
            'blog' => $blog,
            'media' => $blog->getFirstMediaUrl('blogs'),
            'tagged' => $blog->tagArray,
            'tags' => Blog::allTags(),
            'views' => $blog->visit()->count(),
            'cats' => BlogCategoryResource::collection(BlogCategory::all()),
            'popular' => visits(Blog::class)->top(10),
            visits($blog)->increment(),
        ]);
    }
}
