<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportBlogCommentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'report_blog_comment_comment' => ['required'],
            'report_blog_comment_reason' => ['required']
        ];
    }
}
