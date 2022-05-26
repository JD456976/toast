<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportBountyStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'report_bounty_reason' => ['required', 'string'],
            'report_bounty_comment' => ['required','string']
        ];
    }
}
