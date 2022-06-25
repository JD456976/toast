<?php

namespace App\Http\Controllers;

use App\Events\DealCommentCreatedEvent;
use App\Http\Requests\DealCommentStoreRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Deal;
use App\Notifications\DealCommentCreatedNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DealCommentController extends Controller
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
    public function store(DealCommentStoreRequest $request)
    {
        $comment = new Comment();
        $deal = Deal::where('id', $request->deal_id)->first();

        $comment->comment = $request->deal_comment;
        $comment->user_id = Auth::id();

        $deal->comments()->save($comment);

        if ($deal->user->comments === 1) {
            $deal->user->notify(new DealCommentCreatedNotification($deal));
        }

        return to_route('deal.show', $deal->slug)->with('success', 'Comment Added, Thank You!');
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
