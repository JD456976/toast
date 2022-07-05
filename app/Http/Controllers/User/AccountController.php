<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
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

    }

    public function show($id)
    {
        $user = Auth::user();
        return Inertia::render('Account/Dashboard/Edit', [
            'user' => $user,
            'media' => $user->getMedia('avatars')->pluck('original_url'),
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
        $user->deal_notifications = $request->deal_notifications;
        $user->comment_notifications = $request->comment_notifications;
        $user->followers_notifications = $request->followers_notifications;

        $user->update();

        $images = Files::getImages();

        foreach ($images as $image) {
            $user->addMediaFromDisk($image->filepath)->toMediaCollection('avatars');
        }

        Files::deleteImages();

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
