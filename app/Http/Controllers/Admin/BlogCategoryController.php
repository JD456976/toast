<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCategoryStoreRequest;
use App\Http\Requests\Admin\PostCategoryUpdateRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogCategoryController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/BlogCategories/Index', [
            'cats' => BlogCategoryResource::collection(BlogCategory::all())
        ]);
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/BlogCategories/Create');
    }

    /**
     * @param PostCategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PostCategoryStoreRequest $request)
    {
        $cat = new BlogCategory();

        $cat->title = $request->title;
        $cat->is_featured = $request->has('is_featured');

        $cat->save();

        return to_route('admin.blog-category.index')->with('success', $cat->title . ' Saved Successfully!');
    }

    /**
     * @param BlogCategory $blogCategory
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(BlogCategory $blogCategory)
    {
        return Inertia::render('Admin/BlogCategories/Edit', [
            'category' => $blogCategory
        ]);
    }

    /**
     * @param PostCategoryUpdateRequest $request
     * @param BlogCategory $cat
     * @return RedirectResponse
     */
    public function update(PostCategoryUpdateRequest $request, BlogCategory $blogCategory)
    {
        $blogCategory->title = $request->title;
        $blogCategory->is_featured = $request->has('is_featured');

        $blogCategory->update();

        $blogCategory->addAllMediaFromTokens();

        return to_route('admin.blog-category.index')->with('success', $blogCategory->title . ' Updated Successfully!');
    }

    /**
     * @param Request $request
     * @param BlogCategory $cat
     * @return RedirectResponse
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return to_route('admin.blog-category.index')->with('success', $blogCategory->title . ' Deleted!');
    }
}
