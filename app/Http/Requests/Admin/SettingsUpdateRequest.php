<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hot_days' => ['required', 'integer'],
            'new_days' => ['required', 'integer'],
            'deal_points' => ['required', 'integer'],
        ];
    }
}
