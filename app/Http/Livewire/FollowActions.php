<?php

namespace App\Http\Livewire;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FollowActions extends Component
{
    /**
     * @var User
     */
    public User $user;

    public $button;
    /**
     * @var string[]
     */
    protected $listeners = ['delete'];

    /**
     * @param $id
     * @return void
     */
    public function follow($id)
    {
        $follow = Follow::find($id);

        $follow->is_active = 1;

        $follow->update();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'You are now following ' . $follow->follow->displayName(),
            'text' => ''
        ]);
    }


    /**
     * @param $id
     * @return void
     */
    public function unfollow($id)
    {
        $follow = Follow::find($id);

        $follow->is_active = 0;

        $follow->update();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'You are no longer following ' . $follow->follow->displayName(),
            'text' => ''
        ]);
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteConfirm($id)
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
        Follow::where('id', $id)->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'User has been successfully removed.',
            'text' => ''
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.follow-actions');
    }
}
