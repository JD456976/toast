<?php

namespace App\Models;

use App\Models\Presenters\CommentPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Comment extends Model
{
    use HasFactory;
    use CommentPresenter;

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'comment', 'is_approved'];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'integer',
        'is_approved' => 'boolean',
        'is_reported' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function deals()
    {
        return $this->belongsToMany(Deal::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deal()
    {
        return $this->belongsTo(Deal::class, 'commentable_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function reported($id)
    {
        $query = Report::where('reportable_id', $id)
            ->where('reportable_type', 'App\Models\Comment')
            ->where('is_resolved', 0)->first();

        return $query;
    }

    public function scopeDealComments($query, $id)
    {
        return $query->where('commentable_id', $id)->get();
    }

    public function scopeBlogComments($query, $id)
    {
        return $query->where('commentable_id', $id)->get();
    }
}
