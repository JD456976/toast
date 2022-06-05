<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Files extends Model
{
    protected $table = 'fileponds';

    public function scopeGetImages($query)
    {
        return $query->where('created_by', Auth::id())->latest()->take(5)->get();
    }

    public function scopeDeleteImages($query)
    {
        return $query->where('created_by', Auth::id())->latest()->take(5)->delete();
    }

    public function scopeDeleteTemp($query, $id)
    {
        return $query->where('id', $id)->delete();
    }
}
