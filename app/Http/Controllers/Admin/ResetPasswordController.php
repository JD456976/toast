<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordResetRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    /**
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('admin.user.reset-password');
    }

    /**
     * @param PasswordResetRequest $request
     * @return RedirectResponse
     */
    public function create(PasswordResetRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        Password::broker()->sendResetLink(['email' => $user->email]);

        Alert::toast('Password reset link sent', 'success');

        return to_route('admin.user.index');
    }
}
