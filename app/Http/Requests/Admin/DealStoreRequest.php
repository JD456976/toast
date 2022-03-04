<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DealStoreRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'discount' => ['required', 'string'],
            'price' => ['required', 'string'],
            'price_extras' => ['required', 'string'],
            'description' => ['required', 'string'],
            'link' => ['required', 'url'],
        ];
    }
}
