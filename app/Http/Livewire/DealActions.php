<?php

namespace App\Http\Livewire;

use App\Events\UserFollowedEvent;
use App\Models\Deal;
use App\Models\Follow;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DealActions extends Component
{
    public Deal $deal;
    public Follow $follow;

    public function watchlist($id)
    {
        if (Watchlist::new($id) == true) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'warning',
                'title' => 'You already have this in your watchlist',
                'text' => ''
            ]);
        } else {
            $watchlist = new Watchlist();

            $watchlist->user_id = Auth::id();
            $watchlist->product_id = $id;
            $watchlist->is_active = 1;

            $watchlist->save();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Item added to your watchlist!',
                'text' => ''
            ]);
        }
    }

    public function follow($id)
    {
        if (Follow::new($id) == true) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'warning',
                'title' => 'You are already following this user',
                'text' => ''
            ]);
        } else {
            $follow = new Follow();

            $follow->user_id = Auth::id();
            $follow->follow_id = $id;
            $follow->is_active = 1;

            $follow->save();

            if ($follow->user->followers == 1) {
                event(new UserFollowedEvent($follow));
            }
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => $follow->follow->displayName() . ' followed.',
                'text' => ''
            ]);
        }
    }


    public function render()
    {
        return view('livewire.deal-actions');
    }
}
