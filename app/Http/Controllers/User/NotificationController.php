<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Notifications/Index', [
            'notifications' => NotificationResource::collection(Notification::userNotifications())
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
