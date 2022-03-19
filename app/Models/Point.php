<?php

namespace App\Models;

use App\Models\Presenters\PointPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    use PointPresenter;

    public function pointable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function bounties()
    {
        return $this->hasMany(Bounty::class);
    }

    public function deal()
    {
        return $this->hasOne(Deal::class, 'id');
    }

    public function bounty()
    {
        return $this->hasOne(Bounty::class, 'id');
    }
}
