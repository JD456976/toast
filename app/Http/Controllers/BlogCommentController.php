<?php

namespace App\Http\Controllers;

use App\Events\BlogCommentCreatedEvent;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BlogCommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * @param StoreCommentRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function store(StoreCommentRequest $request, $id)
    {
        $comment = new Comment();
        $blog = Blog::where('id', $id)->first();

        $comment->comment = $request->comment;
        $comment->user_id = Auth::id();

        $blog->comments()->save($comment);

        event(new BlogCommentCreatedEvent($blog));

        Alert::toast('Comment Added!', 'success');

        return to_route('blog.show', $blog->slug);
    }

    public function show($id)
    {
        //
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

        Alert::toast('Comment Deleted!', 'success');

        return redirect()->back();
    }
}
