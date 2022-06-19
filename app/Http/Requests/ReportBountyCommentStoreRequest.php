<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportBountyCommentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'report_bounty_comment_reason' => ['required', 'string'],
            'report_bounty_comment_comment' => ['required', 'string']
        ];
    }
}
