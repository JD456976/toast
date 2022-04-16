<?php

namespace App\Http\Livewire;

use App\Models\Watchlist;
use Livewire\Component;

class WatchlistActions extends Component
{

    protected $listeners = ['delete'];

    public function activate($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->is_active = 1;

        $watchlist->update();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Watchlist item activated',
            'text' => ''
        ]);
    }

    public function deactivate($id)
    {
        $watchlist = Watchlist::find($id);

        $watchlist->is_active = 0;

        $watchlist->update();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Watchlist item deactivated',
            'text' => ''
        ]);
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are You Sure!?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        Watchlist::where('id', $id)->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Watchlist item deleted successfully',
            'text' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.watchlist', [
            'active' => Watchlist::active(),
            'inactive' => Watchlist::inactive()
        ]);
    }
}
