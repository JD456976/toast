<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCategoryStoreRequest;
use App\Http\Requests\Admin\PostCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogCategoryController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.blog-category.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.blog-category.create');
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

        Alert::toast($cat->title . ' Saved Successfully!', 'success');

        return to_route('admin.blog-category.index');
    }

    /**
     * @param BlogCategory $blogCategory
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-category.edit', compact('blogCategory'));
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

        Alert::toast($blogCategory->title . ' Updated Successfully!', 'success');

        return to_route('admin.blog-category.index');
    }

    /**
     * @param Request $request
     * @param BlogCategory $cat
     * @return RedirectResponse
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        Alert::toast($blogCategory->title . ' Deleted!', 'error');

        return to_route('admin.blog-category.index');
    }
}
