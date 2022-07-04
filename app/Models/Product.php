<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\ArrayShape;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string $msr
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model implements HasMedia
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
        'brand_id',
        'name',
        'description',
        'slug',
        'msrp',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
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
            ->addMediaCollection('products')
            ->useFallbackUrl('https://via.placeholder.com/150/09f/fff.png')
            ->useFallbackPath(public_path('/images/anonymous-user.jpg'))
            ->singleFile();
    }

    public function visit()
    {
        return visits($this);
    }
}
