<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'slug' => $this->slug,
            'bio' => $this->bio,
            'deal_notifications' => $this->deal_notifications,
            'comment_notifications' => $this->comment_notifications,
            'followers_notifications' => $this->followers_notifications,
            'website' => $this->website,
            'country' => $this->country,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
