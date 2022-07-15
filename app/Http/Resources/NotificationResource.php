<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Notification */
class NotificationResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => json_decode($this->data)->slug,
            'type' => $this->type,
            'title' => json_decode($this->data)->title,
            'content' => json_decode($this->data)->content,
            'read_at' => $this->read_at,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
