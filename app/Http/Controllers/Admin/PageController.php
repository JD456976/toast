<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageStoreRequest;
use App\Http\Requests\Admin\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $pages = Page::all();

        return view('page.index', compact('pages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        return view('page.create');
    }

    /**
     * @param \App\Http\Requests\Admin\PageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request): \Illuminate\Http\Response
    {
        $page = Page::create($request->validated());

        $request->session()->flash('page.id', $page->id);

        return redirect()->route('page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page): \Illuminate\Http\Response
    {
        return view('page.show', compact('page'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Page $page): \Illuminate\Http\Response
    {
        return view('page.edit', compact('page'));
    }

    /**
     * @param \App\Http\Requests\Admin\PageUpdateRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $page): \Illuminate\Http\Response
    {
        $page->update($request->validated());

        $request->session()->flash('page.id', $page->id);

        return redirect()->route('page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page): \Illuminate\Http\Response
    {
        $page->delete();

        return redirect()->route('page.index');
    }
}
