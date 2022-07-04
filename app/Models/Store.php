<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JetBrains\PhpStorm\ArrayShape;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property bool $is_featured
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Store extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use InteractsWithMedia;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_featured',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_featured' => 'boolean',
        'created_at' => 'date: F j, Y',
        'updated_at' => 'date: F j, Y',
    ];

    /**
     * @return \string[][]
     */
    #[ArrayShape(['slug' => "string[]"])] public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('stores')
            ->useFallbackUrl('https://via.placeholder.com/150/09f/fff.png')
            ->useFallbackPath(public_path('/images/anonymous-user.jpg'))
            ->singleFile();
    }

    public function visit()
    {
        return visits($this);
    }

    /**
     * @return HasOne
     */
    public function storeCategory(): HasOne
    {
        return $this->hasOne(StoreCategory::class);
    }

    public function scopeStoreCategories($query, $id)
    {
        return $query->where('id', $id)->get();
    }

    public function scopeShowStore($query, $id)
    {
        return $query->where('id', $id)->first();
    }

    public function deals()
    {
        return $this->hasMany(Deal::class, 'store_id');
    }
}
