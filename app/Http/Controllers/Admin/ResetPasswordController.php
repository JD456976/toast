<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    public function show()
    {
        return view('admin.user.reset-password');
    }

    public function create(PasswordResetRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        Password::broker()->sendResetLink(['email' => $user->email]);

        Alert::toast('Password reset link sent', 'success');

        return to_route('admin.user.index');
    }
}
