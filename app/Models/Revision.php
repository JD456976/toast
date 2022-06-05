<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    public function scopeDealRevisions($query)
    {
        return $query->where('revisionable_type', 'App\Models\Deal')->get();
    }
}
