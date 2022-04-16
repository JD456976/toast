<?php

namespace App\Http\Livewire;

use App\Models\Bounty;
use App\Models\Rating;
use Livewire\Component;

class BountyRating extends Component
{
    public Bounty $bounty;

    public function up($id)
    {
        if (Rating::Rated($id) == true) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => 'You have already voted for this',
                'text' => ''
            ]);
        } else {
            $bounty = Bounty::find($id);

            $bounty->rateOnce(1);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'You voted up successfully!',
                'text' => ''
            ]);
        }
    }

    public function down($id)
    {
        if (Rating::Rated($id) == true) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => 'You have already voted for this',
                'text' => ''
            ]);
        } else {
            $bounty = Bounty::find($id);

            $bounty->rateOnce(-1);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'You voted down successfully!',
                'text' => ''
            ]);
        }
    }

    public function render()
    {
        return view('livewire.bounty-rating');
    }
}
