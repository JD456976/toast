<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Venturecraft\Revisionable\RevisionableTrait;
use willvincent\Rateable\Rateable;

class Deal extends Model implements HasMedia
{
    use HasFactory;
    use Searchable;
    use Sluggable;
    use InteractsWithMedia;
    use Rateable;
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
        'created_at' => 'date: F j, Y',
        'updated_at' => 'date: F j, Y',
    ];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }

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
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }

    /**
     * @return BelongsTo
     */
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Collection
     */
    public static function products()
    {
        return Product::all()->pluck('name', 'id');
    }

    /**
     * @return Collection
     */
    public static function brands()
    {
        return Brand::all()->pluck('name', 'id');
    }

    /**
     * @return Collection
     */
    public static function stores()
    {
        return Store::all()->pluck('name', 'id');
    }

    /**
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return MorphMany
     */
    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    /**
     * @return MorphMany
     */
    public function points()
    {
        return $this->morphMany(Point::class, 'pointable');
    }

    /**
     * @return HasOne
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
            ->where('reportable_type', 'App\Models\Deal')
            ->where('is_resolved', 0)->first();

        return $query;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFrontpage($query)
    {
        return $query->where('is_active', 1)->where('is_frontpage', 1)->paginate(5);
    }

    public function scopeFeaturedDeals($query)
    {
        return $query->where('is_featured', 1)->latest()->get();
    }

    public function scopeUserDeals($query)
    {
        return $query->where('user_id', Auth::id())->get();
    }

    public function scopePublicDeals($query, $id)
    {
        return $query->where('user_id', $id)->get();
    }

    public function scopeShowDeal($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function followed($id)
    {
        $query = Follow::where('follow_id', $id)
            ->where('is_active', 1)
            ->get();

        return $query;
    }

    public static function rating()
    {
        return Rating::groupBy('rateable_id')->select('rating')->count();
    }
}
