<?php

namespace App\Models;

use App\Models\Presenters\BlogPresenter;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property bool $is_active
 * @property bool $is_featured
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Blog extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use Taggable;
    use InteractsWithMedia;
    use Searchable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'is_active',
        'is_featured',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'cat_id' => 'integer',
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

    public function visit()
    {
        return visits($this);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('blogs')
            ->singleFile();
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(
            BlogCategory::class,
            'post_categories_pivot',
            'post_id',
            'post_category_id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function cats()
    {
        return BlogCategory::all()->pluck('title', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'cat_id', 'id');
    }

    /**
     * @return mixed
     */
    public function scopeActivePosts($query)
    {
        return $query->where('is_active', 1)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
