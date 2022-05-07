<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'extension',
        'size'
    ];
}
