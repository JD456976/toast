<?php

namespace App\Models;

use App\Models\Presenters\BountyPresenter;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Venturecraft\Revisionable\RevisionableTrait;
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
class Bounty extends Model implements HasMedia
{
    use HasFactory;
    use Searchable;
    use Sluggable;
    use InteractsWithMedia;
    use Rateable;
    use Notifiable;
    use Taggable;
    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 50;

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

    /**
     * @return \string[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'item_name'
            ]
        ];
    }

    public function visit()
    {
        return visits($this);
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

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function products()
    {
        return Product::all()->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function brands()
    {
        return Brand::all()->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function stores()
    {
        return Store::all()->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function points()
    {
        return $this->morphMany(Point::class, 'pointable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function report()
    {
        return $this->hasOne(Report::class, 'reportable_id');
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function reported($id)
    {
        $query = Report::where('reportable_id', $id)
            ->where('reportable_type', 'App\Models\Bounty')
            ->where('is_resolved', 0)->first();

        return $query;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_active', 1)->where('is_featured', 1)->paginate(5);
    }

    public function scopeUserBounties($query)
    {
        return $query->where('user_id', Auth::id())->get();
    }

    public function scopePublicBounties($query, $id)
    {
        return $query->where('user_id', $id)->get();
    }
}
