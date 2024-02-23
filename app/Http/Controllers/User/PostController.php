<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
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
        $post = Post::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'excerpt'     => $request->excerpt,
            'category_id' => $request->category_id,
            'user_id'     => auth()->id(),
            'status'      => $request->status,
        ]);

        if ($request->hasFile('feature_image')) {
            $post->addMedia($request->feature_image)->toMediaCollection("feature_image");
        }

        if ($request->has('tags')) {
            $tags = explode(",", $request->tags);
            $tags_id = [];

            foreach ($tags as $tag) {
                $tag_model = Tag::where('name', $tag)->first();
                if ($tag_model) {
                    array_push($tags_id, $tag_model->id);
                } else {
                    array_push($tags_id, (Tag::create(['name' =>  $tag]))->id);
                }
            }

            $post->tags()->sync($tags_id);
        }

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
        $categories = Category::all();
        $tags = $post->tags;
        $tags_names = "";
        foreach($tags as $tag){
            $tags_names = $tags_names.",".$tag->name;
        }
        $multimedia = $post->getMedia('feature_image')->first();

        return view('backpanel.posts.edit', compact(['post', 'categories', 'multimedia','tags_names' ]));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $post->update([
            'title'       => $request->title,
            'content'     => $request->content,
            'excerpt'     => $request->excerpt,
            'category_id' => $request->category_id,
            'status'      => $request->status,
        ]);

        if ($request->hasFile('feature_image')) {
            $post->media()->delete();
            $post->addMedia($request->feature_image)
                ->toMediaCollection('feature_image');
        }

        if ($request->has('tags')) {
            $tags = explode(",", $request->tags);
            $tags_id = [];

            foreach ($tags as $tag) {
                $tag_model = Tag::where('name', $tag)->first();
                if ($tag_model) {
                    array_push($tags_id, $tag_model->id);
                } else {
                    array_push($tags_id, (Tag::create(['name' =>  $tag]))->id);
                }
            }

            $post->tags()->sync($tags_id);
        }

        return redirect()->route('post.index')->with('success', $post->name . ' updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->update(['status' => 'draft']);
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


    public function uploadPhoto(Request $request)
    {
        $original_name = $request->upload->getClientOriginalName();
        $filename_org = pathinfo($original_name, PATHINFO_FILENAME);
        $ext = $request->upload->getClientOriginalExtension();
        $filename = $filename_org . '_' . time() . '.' . $ext;

        $request->upload->move(storage_path('app/public/blog/images'), $filename);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');

        $url = asset('storage/blog/images/' . $filename);
        $message = "Your Photo Uploaded";

        $res = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, `$url`, `$message`)</script>";
        @header("Content-Type: text/html; charset=utf-8");

        echo $res;
    }
}
