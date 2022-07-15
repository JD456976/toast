<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    public function scopeHotViews()
    {
        return $this->where('name', 'hot_views');
    }

    public function scopeNewDays()
    {
        return self::where('name', 'new_days');
    }
}
