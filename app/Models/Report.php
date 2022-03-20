<?php

namespace App\Models;

use App\Models\Presenters\ReportPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    use ReportPresenter;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reportable()
    {
        return $this->morphTo();
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function bounties()
    {
        return $this->hasMany(Bounty::class);
    }
}
