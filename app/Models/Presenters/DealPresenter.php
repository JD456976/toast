<?php

namespace App\Models\Presenters;

trait DealPresenter
{
    public function dealPrice()
    {
        return '$ '. number_format($this->price, 2);
    }

    public function dealDiscount()
    {
        return '$ '. number_format($this->discount, 2);
    }
}
