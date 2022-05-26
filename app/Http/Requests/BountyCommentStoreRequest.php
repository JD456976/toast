<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BountyCommentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'bounty_comment' => ['required', 'string']
        ];
    }
}
