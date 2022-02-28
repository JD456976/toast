<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsUpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function redirect;

class SettingsController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function index(Settings $settings)
    {
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * @param Request $request
     * @param \App\Classes\Settings $settings
     * @return RedirectResponse
     */
    public function update(SettingsUpdateRequest $request, Settings $settings)
    {
        $settings->put('hot_count', $request->hot_count);
        $settings->put('new_days', $request->new_days);

        Alert::toast('Settings updated successfully!', 'success');

        return redirect()->back();
    }
}
