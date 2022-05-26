<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportDealCommentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'report_deal_comment_comment' => ['required', 'string'],
            'report_deal_comment_reason' => ['required', 'string']
        ];
    }
}
