<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementStoreRequest;
use App\Http\Requests\Admin\AnnouncementUpdateRequest;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use Inertia\Response;

class AnnouncementController extends Controller
{
    /**
     * @return Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Announcements/Index', [
            'announcements' => AnnouncementResource::collection(Announcement::all())
        ]);
    }

    /**
     * @return Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return Inertia::render('Admin/Announcements/Create', [
            'types' => Announcement::types()
        ]);
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
        $announcement->expires = new Carbon($request->expires);
        $announcement->is_active = $request->is_active;

        $announcement->save();

        return to_route('admin.announcement.index')->with('success', $announcement->title . ' saved successfully!');
    }

    /**
     * @param Announcement $announcement
     * @return Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(Announcement $announcement)
    {
        return Inertia::render('Admin/Announcements/Edit', [
            'announcement' => $announcement,
            'types' => Announcement::types()
        ]);
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
        $announcement->expires = new Carbon($request->expires);
        $announcement->is_active = $request->is_active;

        $announcement->update();

        return to_route('admin.announcement.index')->with('success', $announcement->title . ' updated successfully!');
    }

    /**
     * @param Announcement $announcement
     * @return RedirectResponse
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return to_route('admin.announcement.index')->with('success', $announcement->title . ' deleted successfully!');
    }
}
