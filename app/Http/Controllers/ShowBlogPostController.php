<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;

class ShowBlogPostController extends Controller
{
    /**
     * @param Post $post
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function __invoke(Post $post)
    {
        $post = Post::where('slug', $post->slug)->first();
        return view('frontend.blog.show', compact('post'));
    }
}
