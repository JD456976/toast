<?php

namespace App\Http\Livewire;

use App\Models\Watchlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class WatchlistActions extends Component
{
    /**
     * @var string[]
     */
    protected $listeners = ['delete'];

    /**
     * @param $id
     * @return void
     */
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

    /**
     * @param $id
     * @return void
     */
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
        Watchlist::where('id', $id)->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Watchlist item deleted successfully',
            'text' => ''
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.watchlist', [
            'active' => Watchlist::active(),
            'inactive' => Watchlist::inactive()
        ]);
    }
}
