<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BountyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'deal_id' => ['required', 'integer', 'exists:deals,id'],
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'store_id' => ['required', 'integer', 'exists:stores,id'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'item_name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'item_url' => ['required', 'string'],
            'is_filled' => ['required'],
            'filled_id' => ['required', 'integer', 'exists:filleds,id'],
            'is_verified' => ['required'],
            'is_active' => ['required'],
            'is_featured' => ['required'],
        ];
    }
}
