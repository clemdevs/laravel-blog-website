<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreCommentRequest;
use App\Http\Requests\Comments\UpdateCommentRequest;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $user = Auth::user();
        Comment::create(
            array_merge(
                $request->validated(),
                [
                    'commentable_type' => BlogPost::class,
                    'commentable_id' => $request->post_id,
                    'user_id' => $user->id,
                ]
            ));
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('blog.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        $post = $comment->commentable;
        return redirect()->route('post.show', ['post' => $post])->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $replies = $comment->replies;

        if($replies){
            foreach ($replies as $reply) {
                $reply->delete();
            }
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
