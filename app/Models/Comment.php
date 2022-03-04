<?php

namespace App\Models;

use App\Models\Presenters\CommentPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, CommentPresenter;

    protected $fillable = ['user_id', 'comment', 'is_approved'];

    protected $casts = [
        'id' => 'integer',
        'is_approved' => 'boolean',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function deals()
    {
        return $this->belongsToMany(Deal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
