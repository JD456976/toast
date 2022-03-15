<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.post.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Post::Cats();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * @param PostStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Post();

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->cat_id = $request->cat_id;
        $post->is_active = $request->has('is_active');
        $post->is_featured = $request->has('is_featured');

        $post->save();

        Alert::toast($post->title . ' Added successfully!', 'success');

        return to_route('show.post', $post->id);
    }

    /**
     * @param Post $post
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        $categories = Post::Cats();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        $post->cat_id = $request->cat_id;
        $post->is_active = $request->has('is_active');
        $post->is_featured = $request->has('is_featured');

        $post->update();

        Alert::toast($post->title . ' Updated successfully!', 'success');

        return to_route('show.post', $post->id);
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Alert::toast($post->title . ' delete successfully!', 'error');

        return to_route('admin.post.index');
    }
}
