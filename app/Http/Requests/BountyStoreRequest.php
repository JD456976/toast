<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BountyStoreRequest extends FormRequest
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
            'item_name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'item_url' => ['required', 'string'],
            'award' => ['required', 'string'],
            'tags' => ['required', 'string'],
        ];
    }
}
