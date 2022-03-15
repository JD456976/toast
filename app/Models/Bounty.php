<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Bounty extends Model
{
    use HasFactory;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Deal::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filled(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
