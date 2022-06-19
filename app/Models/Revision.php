<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    public function scopeDealRevisions($query)
    {
        return $query->where('revisionable_type', Deal::class)->get();
    }

    public function scopeBountyRevisions($query)
    {
        return $query->where('revisionable_type', Bounty::class)->get();
    }
}
