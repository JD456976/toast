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
            'content' => Str::limit($this->content, 20, ' ...'),
            'title' => $this->title,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
