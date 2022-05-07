<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function store(Request $request, User $user)
    {
        // validate the incoming file
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'required|file|image|mimes:jpg,jpeg,png'
            ]);
        }

        // save the file in storage
        $path = $request->file('avatar')->store('public/images');

        if (!$path) {
            return response()->json(['error' => 'The file could not be saved.'], 500);
        }

        $uploadedFile = $request->file('avatar');

        // create image model
        $image = Image::create([
            'name' => $uploadedFile->hashName(),
            'extension' => $uploadedFile->extension(),
            'size' => $uploadedFile->getSize()
        ]);

        $user = User::where('id', Auth::id())->first();

        $user->avatar = $uploadedFile->hashName();

        $user->update();
        // return that image model back to the frontend
        return $image->name;
    }
}
