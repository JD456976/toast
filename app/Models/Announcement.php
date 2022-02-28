<?php

namespace App\Models;

use App\Enums\AnnouncementTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $type
 * @property \Carbon\Carbon $expires
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Announcement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'type',
        'expires',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'expires' => 'datetime',
        'is_active' => 'boolean',
        'type' => AnnouncementTypes::class
    ];

    public static function types()
    {
        $types = AnnouncementTypes::cases();
        return Arr::pluck($types, 'name', 'value');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1)->get();
    }
}
