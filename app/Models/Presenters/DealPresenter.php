<?php

namespace App\Models\Presenters;

use Carbon\Carbon;

trait DealPresenter
{
    /**
     * @return string
     */
    public function dealPrice()
    {
        return '$ '. number_format($this->price, 2);
    }

    public function dealDiscount()
    {
        return '$ '. number_format($this->discount, 2);
    }

    /**
     * @return void
     */
    public function hotTag()
    {
        if (Carbon::parse(Carbon::now())->diffInDays($this->created_at) <= settings()->get('hot_days')) {
            ?>
            <div class="product-badges product-badges-position product-badges-mrg">
                 <span class="hot">Hot</span>
            </div>
            <?php
        }
    }

    /**
     * @return void
     */
    public function newTag()
    {
        if (Carbon::parse(Carbon::now())->diffInDays($this->created_at) <= settings()->get('new_days')) {
            ?>
            <div class="product-badges product-badges-position product-badges-mrg">
                <span class="new">New</span>
            </div>
            <?php
        }
    }

    public function createdAt()
    {
        return $this->created_at->diffForHumans();
    }

    public function updatedAt()
    {
        return $this->updated_at->diffForHumans();
    }
}
