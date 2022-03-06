<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageStoreRequest;
use App\Http\Requests\Admin\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.page.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * @param PageStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PageStoreRequest $request)
    {
        $page = new Page();

        $page->title = $request->title;
        $page->content = $request->content;
        $page->is_active = $request->has('is_active');
        $page->footer_menu = $request->has('footer_menu');
        $page->header_menu = $request->has('header_menu');

        $page->save();

        Alert::toast($page->title . ' saved successfully!', 'success');

        return to_route('admin.page.index');
    }

    /**
     * @param Page $page
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * @param PageUpdateRequest $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->title = $request->title;
        $page->content = $request->content;
        $page->is_active = $request->has('is_active');
        $page->footer_menu = $request->has('footer_menu');
        $page->header_menu = $request->has('header_menu');

        $page->update();

        Alert::toast($page->title . ' updated successfully!', 'success');

        return to_route('admin.page.index');
    }

    /**
     * @param Page $page
     * @return RedirectResponse
     */
    public function destroy(Page $page)
    {
        $page->delete();

        Alert::toast($page->title . ' deleted successfully!', 'error');

        return to_route('admin.page.index');
    }
}
