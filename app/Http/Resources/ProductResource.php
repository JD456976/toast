<?php

namespace App\Http\Resources;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class ProductResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'brand' => Brand::where('id', $this->brand_id)->first(),
            'name' => $this->name,
            'description' => $this->description,
            'media' => $this->getFirstMediaUrl('products'),
            'slug' => $this->slug,
            'msrp' => $this->msrp,
            'is_featured' => $this->is_featured,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
