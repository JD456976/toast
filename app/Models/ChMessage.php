<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChMessage extends Model
{
    public static function unseenCount()
    {
        return self::where('to_id', Auth::id())->where('seen', 0)->count();
    }
}
