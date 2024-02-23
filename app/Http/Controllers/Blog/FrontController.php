<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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
    public function tagWisePost(Tag $tag){
        return view('blog.tag-wise-post', compact('tag'));
    }

    public function authorWisePost(User $user){
        return view('blog.author-wise-post', compact('user'));
    }
}
