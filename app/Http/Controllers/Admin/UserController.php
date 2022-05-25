<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => UserResource::collection(User::all()),
        ]);
    }


    /**
     * @param User $user
     * @return Application
     * |\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * @param User $user
     * @return \Inertia\Response
     * |\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user
        ]);
    }

    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->active_status = $request->has('active_status');

        $user->update();

        return to_route('admin.user.index')->with('success', 'User Successfully Updated');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        Alert::toast($user->displayName() . ' deleted!', 'error');

        return to_route('admin.user.index');
    }
}
