<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WarnStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'warn_user_reason' => ['required', 'string'],
            'warn_user_comment' => ['required', 'string'],
            'expires' => ['required'],
        ];
    }
}
