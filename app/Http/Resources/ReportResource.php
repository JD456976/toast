<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Report */
class ReportResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reason' => $this->reason,
            'comment' => $this->comment,
            'type' => $this->reportable_type,
            'reportable_id' => $this->portable_id,
            'is_resolved' => $this->is_resolved,
            'user' => new UserResource($this->user),
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
