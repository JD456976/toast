<?php

namespace App\Http\Resources;

use App\Models\Bounty;
use App\Models\Deal;
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
            'bounty' => Bounty::where('id', $this->pointable_id)->first(),
            'deal' => Deal::where('id', $this->pointable_id)->first(),
            'type' => $this->pointable_type,
            'pointable_id' => $this->pointable_id,
            'points' => $this->points,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
