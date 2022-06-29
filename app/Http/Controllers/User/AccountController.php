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

    public function show($id)
    {
        $user = UserResource::make(User::where('id', $id)->first());
        return Inertia::render('User/Show', [
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
            Request::validate([
                'password' => ['required'],
                'password_confirmation' => ['sometimes', 'required', 'confirmed']
            ]);
            $request->password = Hash::make($request->password);
            $user->update(['password' => Request::get('password')]);
        } else {
            unset($request->password);
        }
        return redirect()->back()->with('success', 'Account has been updated');
    }
}
