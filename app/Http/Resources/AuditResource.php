<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Audit */
class AuditResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => new UserResource($this->user),
            'id' => $this->id,
            'event' => $this->event,
            'user_id' => $this->user_id,
            'old_title' => json_decode($this->old_values)->title,
            'old_discount' => json_decode($this->old_values)->discount,
            'old_price' => json_decode($this->old_values)->price,
            'old_price_extras' => json_decode($this->old_values)->price_extras,
            'old_link' => json_decode($this->old_values)->link,
            'old_is_active' => json_decode($this->old_values)->is_active,
            'old_is_frontpage' => json_decode($this->old_values)->is_frontpage,
            'old_is_featured' => json_decode($this->old_values)->is_featured,
            'old_description' => json_decode($this->old_values)->description,
            'new_title' => json_decode($this->new_values)->title,
            'new_discount' => json_decode($this->new_values)->discount,
            'new_price' => json_decode($this->new_values)->price,
            'new_price_extras' => json_decode($this->new_values)->price_extras,
            'new_link' => json_decode($this->new_values)->link,
            'new_is_active' => json_decode($this->new_values)->is_active,
            'new_is_frontpage' => json_decode($this->new_values)->is_frontpage,
            'new_is_featured' => json_decode($this->new_values)->is_featured,
            'new_description' => json_decode($this->new_values)->description,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
