<?php

namespace App\Http\Controllers;

use App\Events\CommentReportedEvent;
use App\Http\Requests\ReportBlogCommentStoreRequest;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportBlogCommentController extends Controller
{
    public function __invoke(ReportBlogCommentStoreRequest $request, $id)
    {
        if (!empty(Comment::reported($id))) {
            return to_route('blog.show', $request->slug)->with('error', 'This comment has already been reported');
        }

        $report = new Report();
        $comment = Comment::where('id', $id)->first();

        $comment->is_reported = 1;
        $comment->update();

        $report->reason = $request->report_blog_comment_reason;
        $report->comment = $request->report_blog_comment_comment;
        $report->user_id = Auth::id();
        $report->parent_slug = $request->slug;
        $report->is_resolved = 0;

        $comment->reports()->save($report);

        event(new CommentReportedEvent($comment));

        return to_route('blog.show', $request->slug)->with('success', 'Comment Reported');
    }
}
