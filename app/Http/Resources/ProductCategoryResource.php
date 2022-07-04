<?php

namespace App\Http\Resources;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ProductCategory */
class ProductCategoryResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'product' => Product::where('id', $this->parent_id)->first(),
            'name' => $this->name,
            'description' => $this->description,
            'media' => $this->getFirstMediaUrl('product-categories'),
            'slug' => $this->slug,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
