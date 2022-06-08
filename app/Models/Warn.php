<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $user_id
 * @property int $staff_id
 * @property string $reason
 * @property string $content
 * @property Carbon $expires
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Warn extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'staff_id',
        'reason',
        'content',
        'expires',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'staff_id' => 'integer',
        'expires' => 'date: F j, Y',
        'created_at' => 'date: F j, Y',
        'updated_at' => 'date: F j, Y',
    ];

    /**
     * @var string[]
     */
    protected array $auditInclude = [
        'reason',
        'content',
        'staff_id',
        'expires'
    ];

    /**
     * @var bool
     */
    protected bool $auditTimestamps = true;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeShowWarn($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeUserWarns($query)
    {
        return $query->where('user_id', Auth::id())->get();
    }
}
