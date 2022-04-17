<?php

namespace App\Http\Livewire;

use App\Models\Deal;
use App\Models\Rating;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DealRating extends Component
{
    /**
     * @var Deal
     */
    public Deal $deal;

    public $rating;

    protected $listeners = ['newRating' => 'updatedRating'];

    /**
     * @param $id
     * @return void
     */
    public function up($id)
    {
        if (Rating::Rated($id) == true) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => 'You have already voted for this',
                'text' => ''
            ]);
        } else {
            $deal = Deal::find($id);

            $deal->rateOnce(1);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'You voted up successfully!',
                'text' => ''
            ]);

            $this->emit('newRating');
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function down($id)
    {
        if (Rating::Rated($id) == true) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => 'You have already voted for this',
                'text' => ''
            ]);
        } else {
            $deal = Deal::find($id);

            $deal->rateOnce(-1);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'You voted down successfully!',
                'text' => ''
            ]);
            
            $this->emit('newRating');
        }
    }

    public function updatedRating()
    {
        return $this->rating = $this->deal->dealRating();
    }

    public function mount()
    {
        $this->rating = $this->deal->dealRating();
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.deal-rating');
    }
}
