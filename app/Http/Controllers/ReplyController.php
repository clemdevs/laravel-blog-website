<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreReplyRequest;
use App\Http\Requests\Comments\UpdateReplyRequest;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
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
    public function store(StoreReplyRequest $request)
    {
        $replyData = $request->createReplyData();

        $reply = Reply::create($replyData);

        if(!empty($replyData['parentReply']) && $replyData['parentReply'] !== false){
            $reply->nestedReplies()->attach($reply);
        }

        return back()->with('success', 'Reply added successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        $reply->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();

        return redirect()->back()->with('success', 'Reply deleted successfully.');
    }
}
