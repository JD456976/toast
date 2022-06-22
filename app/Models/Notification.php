<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'read_at',
    ];

    public function scopeUserNotifications($query)
    {
        return $query->where('notifiable_id', Auth::id())->get();
    }

    public function scopeShowNotification($query, $id)
    {
        return $query->where('id', $id);
    }

    public static function notifyCount()
    {
        return self::where('notifiable_id', Auth::id())->where('read_at', null)->count();
    }
}
