<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function handleSearch(Request $req)
    {
        $post = Post::where('title', 'like', '%' . $req->searchInput . '%')->first();

        if ($post) {
            $relatedPosts = Post::where('id', '!=', $post->id)->take(3)->get();
            return  view('blog.single-post', compact(['post', 'relatedPosts']));
        }
        return view('layouts.404');
    }
}
