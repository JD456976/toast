<?php

namespace App\Http\Controllers;

use App\Events\UserFollowedEvent;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FollowController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Following/Index', [
            'following' => Follow::with('user')->where('follow_id', Auth::id())->get(),
            'followed' => Follow::with('follow')->where('user_id', Auth::id())->get(),
        ]);
    }

    public function store($id)
    {
        if (Follow::new($id) == true) {
            return redirect()->back()->with('error', 'You are already following this user.');
        } else {
            $follow = new Follow();

            $follow->user_id = Auth::id();
            $follow->follow_id = $id;
            $follow->is_active = 1;

            $follow->save();

            if ($follow->user->followers == 1) {
                event(new UserFollowedEvent($follow));
            }
            return redirect()->back()->with('success', 'Added to your following list');
        }
    }

    public function destroy($id)
    {
        $follow = Follow::find($id);

        $follow->delete();

        return redirect()->back()->with('success', 'You are no longer following that person');
    }
}
