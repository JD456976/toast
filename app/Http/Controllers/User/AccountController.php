<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Dashboard/Edit', [
            'user' => Auth::user(),
        ]);
    }

    public function show()
    {
        return Inertia::render('Account/Dashboard/Edit', [
            'user' => UserResource::make(Auth::user())
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->bio = $request->bio;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->website = $request->website;
        $user->country = $request->country;
        $user->deal_notifications = $request->has('deal_notifications');
        $user->comment_notifications = $request->has('comment_notifications');
        $user->followers_notifications = $request->has('followers_notifications');

        $images = Files::getImages();

        foreach ($images as $image) {
            $user->addMediaFromDisk($image->filepath)->toMediaCollection('avatars');
        }

        Files::deleteImages();

        $user->avatar = $user->getFirstMediaUrl('avatars');

        $user->update();

        if (!empty($request->password)) {
            $validated = $request->validate([
                'password' => 'required|min:6',
                'password_confirmation' => 'confirmed|min:6',
            ]);

            $validated->password = Hash::make($validated->password);
            $validated->update(['password' => Request::get('password')]);
        } else {
            unset($request->password);
        }
        return redirect()->back()->with('success', 'Account has been updated');
    }
}
