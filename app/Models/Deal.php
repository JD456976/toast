<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Models\Presenters\DealPresenter;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use willvincent\Rateable\Rateable;

/**
 * @property int $id
 * @property int $product_id
 * @property int $store_id
 * @property int $brand_id
 * @property int $user_id
 * @property int $approver_id
 * @property string $title
 * @property string $discount
 * @property string $price
 * @property string $price_extras
 * @property string $description
 * @property string $url
 * @property string $slug
 * @property bool $is_active
 * @property bool $is_frontpage
 * @property bool $is_featured
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Deal extends Model implements HasMedia, Auditable
{
    use HasFactory;
    use Searchable;
    use DealPresenter;
    use Sluggable;
    use Taggable;
    use InteractsWithMedia;
    use HasUploader;
    use \OwenIt\Auditing\Auditable;
    use Rateable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'store_id',
        'brand_id',
        'user_id',
        'approver_id',
        'title',
        'discount',
        'price',
        'price_extras',
        'description',
        'url',
        'slug',
        'is_active',
        'is_frontpage',
        'is_featured',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'store_id' => 'integer',
        'brand_id' => 'integer',
        'user_id' => 'integer',
        'approver_id' => 'integer',
        'is_active' => 'boolean',
        'is_frontpage' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $auditInclude = [
        'title',
        'discount',
        'price',
        'price_extras',
        'description',
        'link',
        'is_active',
        'is_frontpage',
        'is_featured',
    ];

    protected $auditTimestamps = true;

//    public function toSearchableArray()
//    {
//        return [
//            'title' => $this->title,
//            'price' => $this->price,
//            'description' => $this->description,
//        ];
//    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

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
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function products()
    {
        return Product::all()->pluck('name', 'id');
    }

    public static function brands()
    {
        return Brand::all()->pluck('name', 'id');
    }

    public static function stores()
    {
        return Store::all()->pluck('name', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function points()
    {
        return $this->morphMany(Point::class, 'pointable');
    }

    public function report()
    {
        return $this->hasOne(Report::class, 'reportable_id');
    }

    public static function reported($id)
    {
        $query = Report::where('reportable_id', $id)
            ->where('reportable_type', 'App\Models\Deal')
            ->where('is_resolved', 0)->first();

        return $query;
    }

    public function scopeFrontpage($query)
    {
        return $query->where('is_active', 1)->where('is_frontpage', 1)->paginate(5);
    }

    public static function followed($id)
    {
        $query = Follow::where('follow_id', $id)
            ->where('is_active', 1)
            ->get();

        return $query;
    }
}
