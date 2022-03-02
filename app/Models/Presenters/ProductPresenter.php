<?php

namespace App\Models\Presenters;

trait ProductPresenter
{
    public function productPrice()
    {
        return '$ '. number_format($this->msrp, 2);
    }
}
