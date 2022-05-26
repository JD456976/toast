<?php

namespace App\Http\Controllers;

use App\Events\BountyCommentCreatedEvent;
use App\Http\Requests\BountyCommentStoreRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Bounty;
use App\Models\Comment;
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
    public function store(BountyCommentStoreRequest $request, $id)
    {
        $comment = new Comment();
        $bounty = Bounty::where('id', $id)->first();

        $comment->comment = $request->bounty_comment;
        $comment->user_id = Auth::id();

        $bounty->comments()->save($comment);

        event(new BountyCommentCreatedEvent($bounty));

        Alert::toast('Comment Added!', 'success');

        return to_route('bounty.show', $bounty->slug);
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
