<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Revision */
class RevisionResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->revisionable_type,
            'model' => $this->revisionable_id,
            'user' => User::where('id', $this->user_id)->first(),
            'key' => $this->key,
            'old_value' => $this->old_value,
            'new_value' => $this->new_value,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
