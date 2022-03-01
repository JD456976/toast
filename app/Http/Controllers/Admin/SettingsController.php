<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        return view('admin.setting.index');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(SettingsUpdateRequest $request)
    {
        settings()->set([
            'hot_days' => $request->hot_days,
            'new_days' => $request->new_days,
        ]);

        Alert::toast('Settings updated successfully!', 'success');

        return redirect()->back();
    }
}
