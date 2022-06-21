<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class FeatureBlogController extends Controller
{
    public function __invoke($id)
    {
        $blog = Blog::find($id);
        if ($blog->is_featured === false) {
            $blog->is_featured = true;
            $blog->update();
            return back()->with('success', 'Blog Post Featured!');
        }

        $blog->is_featured = false;
        $blog->update();
        return back()->with('success', 'Blog Post Unfeatured!');
    }
}
