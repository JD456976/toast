<?php

namespace App\Http\Controllers;

use App\Events\UserFollowedEvent;
use App\Models\Follow;
use App\Notifications\UserFollowedNotification;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FollowController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Following/Index', [
            'followers' => Follow::followers()->load('user'),
            'following' => Follow::following()->load('follow'),
        ]);
    }

    public function store($id)
    {
        if (Follow::new($id)) {
            return redirect()->back()->with('error', 'You are already following this user.');
        }

        $follow = new Follow();

        $follow->user_id = Auth::id();
        $follow->follow_id = $id;
        $follow->is_active = 1;

        $follow->save();

        if ($follow->follow->followers === 1) {
            $follow->follow->notify(new UserFollowedNotification($follow));
        }
        return redirect()->back()->with('success', 'Added to your following list');
    }

    public function destroy($id)
    {
        $follow = Follow::find($id);

        $follow->delete();

        return redirect()->back()->with('success', 'You are no longer following that person');
    }
}
