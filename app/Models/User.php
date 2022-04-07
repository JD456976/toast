<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Models\Presenters\UserPresenter;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use UserPresenter;
    use LaratrustUserTrait;
    use Sluggable;
    use InteractsWithMedia;
    use HasUploader;

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
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function admins()
    {
        return User::whereRoleIs('admin')->get();
    }

    public function getPoints()
    {
        return Point::where('user_id', Auth::id())->pluck('points')->sum();
    }

    public function bounties()
    {
        return $this->hasMany(Bounty::class, 'user_id');
    }

    public function deals()
    {
        return $this->hasMany(Deal::class, 'user_id');
    }

    public function following()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function followed()
    {
        return $this->hasMany(Follow::class, 'follow_id');
    }
}
