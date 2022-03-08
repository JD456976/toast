<?php

namespace App\Http\Controllers;

use App\Events\CommentReportedEvent;
use App\Http\Requests\ReportStoreRequest;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReportCommentController extends Controller
{
    public function __invoke(ReportStoreRequest $request, $id)
    {
        if (!empty(Comment::reported($id))) {
            Alert::toast('This comment has already been reported', 'info');
        } else {
            $report = new Report();

            $comment = Comment::where('id', $id)->first();

            $report->reason = $request->reason;
            $report->comment = $request->comment;
            $report->user_id = Auth::id();
            $report->is_resolved = 0;

            $comment->reports()->save($report);

            event(new CommentReportedEvent($comment));

            Alert::toast('Comment Reported!', 'success');
        }

        return redirect()->back();
    }
}
