<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDealAudits($query, $id)
    {
        return $query->where("auditable_id", $id)->get();
    }
}
