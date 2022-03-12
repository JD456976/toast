<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Rating extends Model
{
    use HasFactory;

    public static function rated($id)
    {
        return Rating::where('rateable_id', $id)->where('user_id', Auth::id())->first();
    }
}
