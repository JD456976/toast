<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DealUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'discount' => ['required', 'string'],
            'price' => ['required', 'string'],
            'price_extras' => ['required', 'string'],
            'description' => ['required', 'string'],
            'link' => ['required', 'url'],
        ];
    }
}
