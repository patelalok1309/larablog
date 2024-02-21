<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backpanel.posts.index')
            ->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backpanel.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title'       => $request->title,
            'content'     => $request->content,
            'excerpt'     => $request->excerpt,
            'category_id' => $request->category_id,
            'user_id'     => 1,
            'status'      => $request->status,
        ];
        $post = Post::create($data);

        return redirect()->route('post.index')->with('success', $post->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Request $req)
    {
        return view('backpanel.posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = [
            "name" => $request->name,
        ];

        $post->update($data);
        return redirect()->route('post.index')->with('success', $post->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', ' deleted successfully');
    }


    public function trashedPost()
    {
        return view('backpanel.posts.trashed')->with('posts', Post::onlyTrashed()->get());
    }


    public function restorePost($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('post.index')->with('success',  'restored successfully');
    }


    public function forceDeletePost($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->forceDelete();
        return redirect()->route('post.index')->with('success',  'post Deleted Permanently');
    }
}
