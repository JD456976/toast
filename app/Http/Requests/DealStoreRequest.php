<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'discount' => ['required', 'string'],
            'price' => ['required', 'string'],
            'price_extras' => ['required', 'string'],
            'description' => ['required', 'string'],
            'link' => ['required', 'url'],
            'tags' => ['required'],
            'brand' => ['required'],
            'store' => ['required'],
            'product' => ['required'],
        ];
    }
}
