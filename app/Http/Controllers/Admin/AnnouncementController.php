<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementStoreRequest;
use App\Http\Requests\Admin\AnnouncementUpdateRequest;
use App\Models\Announcement;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class AnnouncementController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.announcement.index');
    }

    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $types = Announcement::types();
        return view('admin.announcement.create', compact('types'));
    }

    /**
     * @param AnnouncementStoreRequest $request
     * @return RedirectResponse
     */
    public function store(AnnouncementStoreRequest $request)
    {
        $announcement = new Announcement();

        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->type = $request->type;
        $announcement->expires = $request->expires;
        $announcement->is_active = $request->has('is_active');

        $announcement->save();

        Alert::toast($announcement->title . ' saved successfully!', 'success');

        return to_route('admin.announcement.index');
    }

    /**
     * @param Announcement $announcement
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Announcement $announcement)
    {
        $types = Announcement::types();
        return view('admin.announcement.edit', compact('announcement', 'types'));
    }

    /**
     * @param AnnouncementUpdateRequest $request
     * @param Announcement $announcement
     * @return RedirectResponse
     */
    public function update(AnnouncementUpdateRequest $request, Announcement $announcement)
    {
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->type = $request->type;
        $announcement->expires = $request->expires;
        $announcement->is_active = $request->has('is_active');

        $announcement->update();

        Alert::toast($announcement->title . ' updated successfully!', 'success');

        return to_route('admin.announcement.index');
    }

    /**
     * @param Announcement $announcement
     * @return RedirectResponse
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        Alert::toast($announcement->title . ' deleted successfully!', 'error');

        return to_route('admin.announce.index');
    }
}
