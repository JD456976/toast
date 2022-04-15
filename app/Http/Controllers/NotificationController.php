<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class NotificationController extends Controller

{
    /**
     * @param $id
     * @return RedirectResponse
     */
    public function update($id)
    {
        $notification = Notification::find($id);

        $notification->read_at = Carbon::now();

        $notification->update();

        Alert::toast('Notification Marked as Read', 'success');

        return redirect()->back();
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);

        $notification->delete();

        Alert::toast('Notification Deleted', 'warning');

        return redirect()->back();
    }
}
