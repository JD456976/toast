<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory
     * |\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->first()->load(['deals', 'bounties', 'views']);

        if ((View::userViewExists($user->id)) === null) {
            $view = new View();
            $view->user_id = Auth::id();
            $user->views()->save($view);
        }
        return Inertia::render('User/Show', [
            'user' => $user,
            'media' => $user->getMedia('avatars'),
        ]);
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
