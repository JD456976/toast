<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Page extends Model implements HasMedia, Viewable
{
    use HasFactory;
    use Sluggable;
    use InteractsWithMedia;
    use InteractsWithViews;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_active',
        'footer_menu',
        'header_menu',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'footer_menu' => 'boolean',
        'header_menu' => 'boolean',
        'created_at' => 'date: F j, Y',
        'updated_at' => 'date: F j, Y',
    ];

    /**
     * @return \string[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return mixed
     */
    public static function headerMenu()
    {
        return self::where('is_active', 1)->where('header_menu', 1)->get();
    }

    /**
     * @return mixed
     */
    public static function footerMenu()
    {
        return self::where('is_active', 1)->where('footer_menu', 1)->get();
    }

    public function scopeShowPage($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }
}
