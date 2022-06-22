<?php

namespace App\Http\Controllers;

use App\Events\BlogCommentCreatedEvent;
use App\Http\Requests\BlogCommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Notifications\BlogCommentCreatedNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    /**
     * @param StoreCommentRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function store(BlogCommentRequest $request, $id)
    {
        $comment = new Comment();
        $blog = Blog::where('id', $id)->first();

        $comment->comment = $request->blog_comment;
        $comment->user_id = Auth::id();

        $blog->comments()->save($comment);

        $blog->user->notify(new BlogCommentCreatedNotification($blog));

        return to_route('blog.show', $blog->slug)->with('success', 'Comment Added!');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->back()->with('success', 'Comment Deleted!');
    }
}
