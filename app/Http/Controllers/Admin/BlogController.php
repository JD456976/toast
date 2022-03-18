<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Blog::Cats();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * @param PostStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        $blog = new Blog();

        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->cat_id = $request->cat_id;
        $blog->is_active = $request->has('is_active');
        $blog->is_featured = $request->has('is_featured');

        $blog->save();

        $blog->tag($request->tags);

        $blog->addAllMediaFromTokens();

        Alert::toast($blog->title . ' Added successfully!', 'success');

        return to_route('blog.show', $blog->slug);
    }

    /**
     * @param Blog $blog
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Blog $blog)
    {
        $categories = Blog::Cats();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * @param PostUpdateRequest $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->cat_id = $request->cat_id;
        $blog->is_active = $request->has('is_active');
        $blog->is_featured = $request->has('is_featured');

        $blog->update();

        $blog->retag($request->tags);

        $blog->addAllMediaFromTokens();

        Alert::toast($blog->title . ' Updated successfully!', 'success');

        return to_route('blog.show', $blog->slug);
    }

    /**
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        Alert::toast($blog->title . ' delete successfully!', 'error');

        return to_route('admin.blog.index');
    }
}
