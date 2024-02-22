<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request , Post $post){
        $post->comments()->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'comment'   => $request->comment,
            'parent_id' => $request->comment_id
        ]);

        return back();
    }
}
