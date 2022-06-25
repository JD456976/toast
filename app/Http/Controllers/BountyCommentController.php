<?php

namespace App\Http\Controllers;

use App\Events\BountyCommentCreatedEvent;
use App\Http\Requests\BountyCommentStoreRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Bounty;
use App\Models\Comment;
use App\Notifications\BountyCommentCreatedNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BountyCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * @param StoreCommentRequest $request
     * @return RedirectResponse
     */
    public function store(BountyCommentStoreRequest $request)
    {
        $comment = new Comment();
        $bounty = Bounty::where('id', $request->bounty_id)->first();

        $comment->comment = $request->bounty_comment;
        $comment->user_id = Auth::id();

        $bounty->comments()->save($comment);

        $bounty->user->notify(new BountyCommentCreatedNotification($bounty));

        return to_route('bounty.show', $bounty->slug)->with('success', 'Comment Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCommentRequest $request
     * @param Comment $comment
     * @return Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * @param Comment $comment
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
