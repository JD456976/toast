<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Bounty */
class BountyResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => User::where('id', $this->user_id)->first(),
            'filler' => User::where('id', $this->filled_id)->first(),
            'user_id' => $this->user_id,
            'deal_id' => $this->deal_id,
            'award' => $this->award,
            'slug' => $this->slug,
            'product' => ProductResource::make($this->product),
            'store' => StoreResource::make($this->store),
            'brand' => BrandResource::make($this->brand),
            'item_name' => $this->item_name,
            'description' => $this->description,
            'item_url' => $this->item_url,
            'is_filled' => $this->is_filled,
            'filled_id' => $this->filled_id,
            'is_verified' => $this->is_verified,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
