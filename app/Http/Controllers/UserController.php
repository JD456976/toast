<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * @param User $user
     * @return Application
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('frontend.user.edit', compact('user'));
    }

    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if (!empty($request->new_password)) {
            $request->new_password = Hash::make($request->new_password);
        } else {
            unset($request->new_password);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->addAllMediaFromTokens();

        Alert::toast('Your profile has been updated successfully!', 'success');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param User $user
     * @return Application
     * |RedirectResponse
     * |\Illuminate\Routing\Redirect
     */
    public function destroy(Request $request, User $user)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user->delete();

        return redirect('/');
    }
}
