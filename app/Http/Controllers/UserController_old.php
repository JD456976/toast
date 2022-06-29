<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use RealRashid\SweetAlert\Facades\Alert;

class UserControllerOld extends Controller
{
    /**
     * @param User $user
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->first()->load(['deals', 'bounties']);
        return Inertia::render('User/Show', [
            'user' => $user
        ]);
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
        $user->watchlist = $request->has('watchlist');
        $user->comments = $request->has('comments');
        $user->followers = $request->has('followers');

        $user->update();

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
