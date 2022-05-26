<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Dashboard/Edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update($id, Request $request)
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
        ]);

        $user = User::find($id);

        $user->update(Request::only(['name', 'email']));

        if (!empty($request->new_password)) {
            Request::validate([
                'password' => ['required'],
                'password_confirmation' => ['sometimes', 'required', 'confirmed']
            ]);
            $request->new_password = Hash::make($request->new_password);
            $user->update(['password' => Request::get('password')]);
        } else {
            unset($request->new_password);
        }
        return redirect()->back()->with('success', 'Account has been updated');
    }
}
