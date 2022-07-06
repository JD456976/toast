<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 *
 */
class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use LaratrustUserTrait;
    use Sluggable;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'watchlist',
        'comments',
        'followers',
    ];

    protected $with = ['deals', 'bounties'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'date: F j, Y',
        'updated_at' => 'date: F j, Y',
        'comment_notifications' => 'boolean',
        'deal_notifications' => 'boolean',
        'followers_notifications' => 'boolean'
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
            ->addMediaCollection('avatars')
            ->singleFile();
    }

    /**
     * @return mixed
     */
    public static function admins(): mixed
    {
        return self::whereRoleIs('admin')->get();
    }

    /**
     * @return mixed
     */
    public static function getPoints(): mixed
    {
        return Point::where('user_id', Auth::id())->pluck('points')->sum();
    }

    /**
     * @return HasMany
     */
    public function bounties(): HasMany
    {
        return $this->hasMany(Bounty::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class, 'user_id');
    }

    public function avatar()
    {
        return $this->where('id', Auth::id())->first();
    }

    /**
     * @return HasMany
     */
    public function following(): HasMany
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function followed(): HasMany
    {
        return $this->hasMany(Follow::class, 'follow_id');
    }
}
