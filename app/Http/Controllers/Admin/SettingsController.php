<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Settings;
use function redirect;

class SettingsController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Settings/Edit', [
            'settings' => Settings::all()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(SettingsUpdateRequest $request)
    {
        settings()->set([
            'hot_views' => $request->hot_views,
            'new_days' => $request->new_days,
            'deal_points' => $request->deal_points,
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
