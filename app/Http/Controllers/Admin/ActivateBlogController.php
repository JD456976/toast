<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class ActivateBlogController extends Controller
{
    public function __invoke($id)
    {
        $blog = Blog::find($id);
        if ($blog->is_active === false) {
            $blog->is_active = true;
            $blog->update();
            return back()->with('success', 'Blog Post Activated!');
        }

        $blog->is_active = false;
        $blog->update();
        return back()->with('success', 'Blog Post Deactivated!');
    }
}
