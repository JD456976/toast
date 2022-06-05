<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class Point extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function pointable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }

    /**
     * @return HasMany
     */
    public function bounties(): HasMany
    {
        return $this->hasMany(Bounty::class);
    }

    /**
     * @return HasOne
     */
    public function deal(): HasOne
    {
        return $this->hasOne(Deal::class, 'id');
    }

    /**
     * @return HasOne
     */
    public function bounty(): HasOne
    {
        return $this->hasOne(Bounty::class, 'id');
    }

    public function scopeUserPoints($query)
    {
        return $query->where('user_id', Auth::id())->get();
    }
}
