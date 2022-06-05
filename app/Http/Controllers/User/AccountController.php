<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Files;
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

    public function show($id)
    {
        $user = UserResource::make(User::where('id', $id)->first());
        return Inertia::render('User/Show', [
            'user' => $user,
            'media' => $user->getMedia('avatars')->pluck('original_url'),
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

        $images = Files::getImages();

        foreach ($images as $image) {
            $user->addMediaFromDisk($image->filepath)->toMediaCollection('avatars');
        }

        Files::deleteImages();

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
