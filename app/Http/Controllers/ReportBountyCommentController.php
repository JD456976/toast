<?php

namespace App\Http\Controllers;

use App\Events\CommentReportedEvent;
use App\Http\Requests\ReportBountyCommentStoreRequest;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportBountyCommentController extends Controller
{
    public function __invoke(ReportBountyCommentStoreRequest $request, $id)
    {
        if (!empty(Comment::reported($id))) {
            return to_route('bounty.show', $request->slug)->with('error', 'This comment has already been reported');
        }

        $report = new Report();
        $comment = Comment::where('id', $id)->first();

        $comment->is_reported = 1;
        $comment->update();

        $report->reason = $request->report_bounty_comment_reason;
        $report->comment = $request->report_bounty_comment_comment;
        $report->user_id = Auth::id();
        $report->parent_slug = $request->slug;
        $report->is_resolved = 0;

        $comment->reports()->save($report);

        event(new CommentReportedEvent($comment));

        return to_route('bounty.show', $request->slug)->with('success', 'Comment Reported');
    }
}
