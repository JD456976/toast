<?php

namespace App\Http\Livewire;

use App\Models\Deal;
use Livewire\Component;
use Weidner\Goutte\GoutteFacade;

class Scraper extends Component
{
    public $title;
    public $link;
    public $url;

    protected $rules = [
        'url' => 'required|url',
    ];

    public function scrape()
    {
        $this->validate();

        $link = GoutteFacade::request('GET', $this->url);

        $this->title = $link->filter('title')->text();
        $this->link = $link->getUri();

        $this->emit('confirmScrape');
    }

    public function render()
    {
        return view('frontend.deal.scraper', [
            'stores' => Deal::stores(),
            'products' => Deal::products(),
            'brands' => Deal::brands(),
        ]);
    }
}
