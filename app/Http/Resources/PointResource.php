<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Point */
class PointResource extends JsonResource
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
            'pointable_type' => $this->pointable_type,
            'pointable_id' => $this->pointable_id,
            'points' => $this->points,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
