<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Warn */
class WarnResource extends JsonResource
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
            'staff' => new UserResource($this->staff),
            'user_id' => $this->user_id,
            'staff_id' => $this->staff_id,
            'reason' => $this->reason,
            'content' => $this->content,
            'expires' => $this->expires,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
