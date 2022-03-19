<?php

namespace App\Models\Presenters;

trait PointPresenter
{
    public function createdAt()
    {
        return $this->created_at->diffForHumans();
    }

    public function updatedAt()
    {
        return $this->updated_at->diffForHumans();
    }
}
