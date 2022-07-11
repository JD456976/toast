<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'brand_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'msrp' => ['required', 'string'],
        ];
    }
}
