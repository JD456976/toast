<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DealUpdateRequest extends FormRequest
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
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'store_id' => ['required', 'integer', 'exists:stores,id'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'approver_id' => ['required', 'integer', 'exists:approvers,id'],
            'title' => ['required', 'string'],
            'discount' => ['required', 'string'],
            'price' => ['required', 'string'],
            'price_extras' => ['required', 'string'],
            'description' => ['required', 'string'],
            'url' => ['required', 'string'],
            'is_active' => ['required'],
            'is_frontpage' => ['required'],
            'is_featured' => ['required'],
        ];
    }
}
