<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Carbon;
use Livewire\Component;

class NotificationActions extends Component
{
    public $user;

    protected $listeners = ['delete'];

    public function markRead($id)
    {
        $notification = Notification::find($id);

        $notification->read_at = Carbon::now();

        $notification->update();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Notification marked as read',
            'text' => ''
        ]);
    }

    public function deleteNotification($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are You Sure!?',
            'text' => '',
            'id' => $id
        ]);
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        Notification::where('id', $id)->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Notification deleted successfully',
            'text' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.notification-actions');
    }
}
