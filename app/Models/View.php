<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    protected $casts = [
        'id' => 'integer',
        'viewable_id' => 'integer'
    ];

    protected $with = ['user'];

    public function viewable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDealViews($query)
    {
        return $query->where('user_id', Auth::id())->where('viewable_type', Deal::class)->pluck('viewable_id');
    }

    public function scopeUserViews($query, $id)
    {
        return $query->where('viewable_id', $id)->where('viewable_type', User::class)->get();
    }

    public static function dealViewExists($id)
    {
        $query = View::where('user_id', Auth::id())->where('viewable_type', Deal::class)->where('viewable_id', $id)->first();
        return $query;
    }

    public static function userViewExists($id)
    {
        $query = View::where('user_id', Auth::id())->where('viewable_type', User::class)->where('viewable_id', $id)->first();
        return $query;
    }
}
