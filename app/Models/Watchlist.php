<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Watchlist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'is_active' => 'boolean',
    ];

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
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return mixed
     */
    public static function active(): mixed
    {
        return self::where('user_id', Auth::user()->id)->where('is_active', 1)->get();
    }

    /**
     * @return mixed
     */
    public static function inactive(): mixed
    {
        return self::where('user_id', Auth::user()->id)->where('is_active', 0)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function new($id)
    {
        return self::where('user_id', Auth::id())->where('product_id', $id)->first();
    }
}
