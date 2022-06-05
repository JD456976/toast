<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogStoreRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Files;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Blogs/Index', [
            'blogs' => BlogResource::collection(Blog::all())
        ]);
    }

    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/Blogs/Create', [
            'categories' => BlogCategory::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * @param BlogStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BlogStoreRequest $request)
    {
        $blog = new Blog();

        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->cat_id = $request->cat_id;
        $blog->is_active = $request->has('is_active');
        $blog->is_featured = $request->has('is_featured');

        $blog->save();

        $images = Files::getImages();

        foreach ($images as $image) {
            $blog->addMediaFromDisk($image->filepath)->toMediaCollection('blogs');
        }

        Files::deleteImages();

        $blog->tag($request->tags);

        return to_route('admin.blog.index')->with('success', $blog->title . ' Added successfully!');
    }

    /**
     * @param Blog $blog
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Blog $blog)
    {
        return Inertia::render('Admin/Blogs/Edit', [
            'categories' => BlogCategory::all(),
            'users' => User::all(),
            'blog' => $blog,
            'media' => $blog->getFirstMediaUrl('blogs'),
            'tagged' => $blog->tagArray
        ]);
    }

    /**
     * @param BlogUpdateRequest $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->cat_id = $request->cat_id;
        $blog->user_id = $request->user_id;
        $blog->is_active = $request->has('is_active');
        $blog->is_featured = $request->has('is_featured');

        $blog->update();

        $blog->clearMediaCollection('blogs');

        $images = Files::getImages();

        foreach ($images as $image) {
            $blog->addMediaFromDisk($image->filepath)->toMediaCollection('blogs');
        }

        Files::deleteImages();

        $blog->retag($request->tags);

        return to_route('admin.blog.index')->with('success', $blog->title . ' Updated successfully!');
    }

    /**
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return to_route('admin.blog.index')->with('success', $blog->title . ' delete successfully!');
    }
}
