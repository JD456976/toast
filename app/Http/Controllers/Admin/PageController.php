<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageStoreRequest;
use App\Http\Requests\Admin\PageUpdateRequest;
use App\Http\Resources\PageResource;
use App\Models\Files;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Pages/Index', [
            'pages' => PageResource::collection(Page::all())
        ]);
    }

    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/Pages/Create');
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
        $page->is_active = $request->is_active;
        $page->footer_menu = $request->footer_menu;
        $page->header_menu = $request->header_menu;

        $page->save();

        $images = Files::getImages();

        foreach ($images as $image) {
            $page->addMediaFromDisk($image->filepath)->toMediaCollection('pages');
        }

        Files::deleteImages();

        return to_route('admin.page.index')->with('success', $page->title . ' saved successfully!');
    }

    /**
     * @param Page $page
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Page $page)
    {
        return Inertia::render('Admin/Pages/Edit', [
            'page' => $page,
            'media' => $page->getMedia('pages')->pluck('original_url'),
        ]);
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
        $page->is_active = $request->is_active;
        $page->footer_menu = $request->footer_menu;
        $page->header_menu = $request->header_menu;

        $page->update();

        $page->clearMediaCollection('pages');

        $images = Files::getImages();

        foreach ($images as $image) {
            $page->addMediaFromDisk($image->filepath)->toMediaCollection('pages');
        }

        Files::deleteImages();

        return to_route('admin.page.index')->with('success', $page->title . ' updated successfully!');
    }

    /**
     * @param Page $page
     * @return RedirectResponse
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return to_route('admin.page.index')->with('success', $page->title . ' deleted successfully!');
    }
}
