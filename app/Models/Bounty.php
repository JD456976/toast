<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Models\Presenters\BountyPresenter;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use willvincent\Rateable\Rateable;

/**
 * @property int $id
 * @property int $user_id
 * @property int $deal_id
 * @property int $product_id
 * @property int $store_id
 * @property int $brand_id
 * @property string $item_name
 * @property string $description
 * @property string $item_url
 * @property bool $is_filled
 * @property int $filled_id
 * @property bool $is_verified
 * @property bool $is_active
 * @property bool $is_featured
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Bounty extends Model implements HasMedia, Auditable
{
    use HasFactory;
    use Searchable;
    use Sluggable;
    use Taggable;
    use InteractsWithMedia;
    use HasUploader;
    use \OwenIt\Auditing\Auditable;
    use Rateable;
    use BountyPresenter;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'deal_id',
        'product_id',
        'store_id',
        'brand_id',
        'item_name',
        'description',
        'item_url',
        'is_filled',
        'filled_id',
        'is_verified',
        'is_active',
        'is_featured',
        'award',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'deal_id' => 'integer',
        'product_id' => 'integer',
        'store_id' => 'integer',
        'brand_id' => 'integer',
        'is_filled' => 'boolean',
        'filled_id' => 'integer',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $auditInclude = [
        'user_id',
        'deal_id',
        'product_id',
        'store_id',
        'brand_id',
        'item_name',
        'description',
        'item_url',
        'is_filled',
        'filled_id',
        'is_verified',
        'is_active',
        'is_featured',
        'award',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'item_name'
            ]
        ];
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
    public function deal(): BelongsTo
    {
        return $this->belongsTo(Deal::class);
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
    public function filled(): BelongsTo
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
            ->where('reportable_type', 'App\Models\Bounty')
            ->where('is_resolved', 0)->first();

        return $query;
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_active', 1)->where('is_featured', 1)->paginate(5);
    }
}
