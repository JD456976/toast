<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Rating extends Model
{
    use HasFactory;

    public static function bountyRated($id)
    {
        return self::where('rateable_id', $id)
            ->where('rateable_type', 'App\Models\Bounty')
            ->where('user_id', Auth::id())->first();
    }

    public static function dealRated($id)
    {
        return self::where('rateable_id', $id)
            ->where('rateable_type', 'App\Models\Deal')
            ->where('user_id', Auth::id())->first();
    }
}
