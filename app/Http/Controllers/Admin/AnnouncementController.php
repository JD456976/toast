<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementStoreRequest;
use App\Http\Requests\Admin\AnnouncementUpdateRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $announcements = Announcement::all();

        return view('announcement.index', compact('announcements'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        return view('announcement.create');
    }

    /**
     * @param \App\Http\Requests\Admin\AnnouncementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementStoreRequest $request): \Illuminate\Http\Response
    {
        $announcement = Announcement::create($request->validated());

        $request->session()->flash('announcement.id', $announcement->id);

        return redirect()->route('announcement.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Announcement $announcement): \Illuminate\Http\Response
    {
        return view('announcement.show', compact('announcement'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Announcement $announcement): \Illuminate\Http\Response
    {
        return view('announcement.edit', compact('announcement'));
    }

    /**
     * @param \App\Http\Requests\Admin\AnnouncementUpdateRequest $request
     * @param \App\Models\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementUpdateRequest $request, Announcement $announcement): \Illuminate\Http\Response
    {
        $announcement->update($request->validated());

        $request->session()->flash('announcement.id', $announcement->id);

        return redirect()->route('announcement.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Announcement $announcement): \Illuminate\Http\Response
    {
        $announcement->delete();

        return redirect()->route('announcement.index');
    }
}
