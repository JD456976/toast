<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCategoryStoreRequest;
use App\Http\Requests\Admin\PostCategoryUpdateRequest;
use App\Models\PostCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostCategoryController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.post-category.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.post-category.create');
    }

    /**
     * @param PostCategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PostCategoryStoreRequest $request)
    {
        $cat = new PostCategory();

        $cat->title = $request->title;
        $cat->is_featured = $request->has('is_featured');

        $cat->save();

        Alert::toast($cat->title . ' Saved Successfully!', 'success');

        return to_route('admin.post-category.index');
    }

    /**
     * @param PostCategory $cat
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(PostCategory $postCategory)
    {
        return view('admin.post-category.edit', compact('postCategory'));
    }

    /**
     * @param PostCategoryUpdateRequest $request
     * @param PostCategory $cat
     * @return RedirectResponse
     */
    public function update(PostCategoryUpdateRequest $request, PostCategory $postCategory)
    {
        $postCategory->title = $request->title;
        $postCategory->is_featured = $request->has('is_featured');

        $postCategory->update();

        Alert::toast($postCategory->title . ' Updated Successfully!', 'success');

        return to_route('admin.post-category.index');
    }

    /**
     * @param Request $request
     * @param PostCategory $cat
     * @return RedirectResponse
     */
    public function destroy(Request $request, PostCategory $cat)
    {
        $cat->delete();

        Alert::toast($cat->title . ' Deleted!', 'error');

        return to_route('admin.post-category.index');
    }
}
