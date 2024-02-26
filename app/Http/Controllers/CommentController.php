<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Index Comments
    public function index()
    {
        return view('backpanel.comments.index')
            ->with('comments', Comment::all());
    }


    // Store Commnets
    public function store(CommentStoreRequest $request, Post $post)
    {
        $post->comments()->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'comment'   => $request->comment,
            'parent_id' => $request->comment_id
        ]);
        return back();
    }

    // Edit Comments view
    public function edit(Comment $comment)
    {
        return view('backpanel.comments.edit', compact('comment'));
    }

    // Update Comments
    public function update(Comment $comment, Request $request)
    {
        $comment->update($request->all());
        return redirect()->route('comment.index')->with('success', 'comment updated successfully');
    }

    // Delete Comments
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index')->with('success', 'comment updated successfully');
    }

    // Approve Comments
    public function approve(Comment $comment){
        if($comment->status == 'pending'){
            $comment->status = 'approve';
            $comment->save();
            return redirect()->route('comment.index')->with('success', 'Comment approved');
        }else{
            return redirect()->route('comment.index')->with('error', 'Already approved');
        }
    }
}
