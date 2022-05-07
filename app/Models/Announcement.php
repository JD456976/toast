<?php

namespace App\Models;

use App\Enums\AnnouncementTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $type
 * @property Carbon $expires
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
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

    /**
     * @return array
     */
    public static function types()
    {
        $types = AnnouncementTypes::cases();
        return Arr::pluck($types, 'name', 'value');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1)->get();
    }
}
