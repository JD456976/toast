<?php

namespace App\Models\Presenters;

trait BountyPresenter
{
    public function bountyRating()
    {
        if (empty($this->averageRating)) {
            return 'Not Rated Yet';
        } else {
            return $this->averageRating;
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
