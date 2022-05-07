<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BlogCategory extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUploader;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_categories_pivot',
            'blog_category_id',
            'blog_id'
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function catPosts($id)
    {
        return Blog::where('is_active', 1)->where('cat_id', $id);
    }
}
