<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Watchlist */
class WatchlistResource extends JsonResource
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
            'product_id' => $this->product_id,
            'is_active' => $this->is_active,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
        ];
    }
}
