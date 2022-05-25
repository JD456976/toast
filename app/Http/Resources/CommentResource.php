<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Comment */
class CommentResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'user_id' => $this->user_id,
            'commentale_id' => $this->commentale_id,
            'comment' => $this->comment,
            'is_reported' => $this->is_reported,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
