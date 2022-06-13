<?php

namespace App\Http\Resources;

use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin \App\Models\Blog */
class BlogResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'category' => BlogCategory::where('id', $this->cat_id)->first(),
            'summary' => Str::limit($this->content, 200, ' ...'),
            'content' => $this->content,
            'title' => $this->title,
            'tag' => $this->tagArray,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'media' => $this->getFirstMediaUrl('blogs'),
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
