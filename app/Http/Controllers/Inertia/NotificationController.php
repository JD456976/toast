<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function index()
    {
        return Inertia::render('Notifications/Index', [
            'unread' => Auth::user()->unreadNotifications,
            'all' => Auth::user()->notifications
        ]);
    }

    public function update($id)
    {
        $notification = Notification::find($id);

        $notification->read_at = Carbon::now();

        $notification->update();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);

        $notification->delete();

        return redirect()->back()->with('success', 'Notification deleted successfully.');
    }
}
