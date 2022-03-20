<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BountyUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'deal_id' => ['required', 'url'],
        ];
    }
}
