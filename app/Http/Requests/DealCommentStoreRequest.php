<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealCommentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'deal_comment' => ['required',]
        ];
    }
}
