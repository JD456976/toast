<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BountyStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'item_name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'item_url' => ['required', 'string'],
            'award' => ['required', 'string'],
            'tags' => ['required', 'string'],
        ];
    }
}
