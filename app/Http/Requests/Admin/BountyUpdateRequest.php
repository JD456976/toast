<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BountyUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'item_name' => ['required', 'string'],
            'item_url' => ['required', 'url'],
            'tags' => ['required'],
            'description' => ['required'],
        ];
    }
}
