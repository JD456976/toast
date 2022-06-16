<?php

namespace App\Http\Resources;

use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Deal */
class DealResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => ProductResource::make($this->product),
            'user' => User::where('id', $this->user_id)->first(),
            'approver' => User::where('id', $this->approver_id)->first(),
            'store' => StoreResource::make($this->store),
            'brand' => BrandResource::make($this->brand),
            'initial' => Rating::where('rateable_id', $this->id)->avg('rating'),
            'user_id' => $this->user_id,
            'title' => $this->title,
            'media' => $this->getFirstMediaUrl('deals'),
            'discount' => $this->discount,
            'price' => $this->price,
            'price_extras' => $this->price_extras,
            'description' => $this->description,
            'link' => $this->link,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
            'is_frontpage' => $this->is_frontpage,
            'is_featured' => $this->is_featured,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
