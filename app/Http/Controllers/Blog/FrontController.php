<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function allPost(){
        $posts = Post::where('status', 'publish')->simplePaginate(4);
        return view('blog.home' , compact('posts'));
    }

    public function singlePost(Post $post){

        $relatedPosts = Post::where( 'id' , '!=' , $post->id)->take(3)->get();
        return  view('blog.single-post', compact(['post' , 'relatedPosts']));
    }

    public function categoryWisePost(Category $category){
        return view('blog.category-wise-post', compact('category'));
    }
}
