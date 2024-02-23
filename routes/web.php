<?php

use App\Http\Controllers\Blog\FrontController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

// Authentication Routes 
Auth::routes();

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require 'admin.php';


// testing post tags
Route::get('/test-route', function () {
    $post = Post::find(2);
    return $post->tags;
});


// Frontend Controller Routes Home , single post , category, tag & author wise post pages
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'allPost')->name('blog.home');
    Route::get('/{post:slug}', 'singlePost')->name('single.post');
    Route::get("/category/{category:slug}", 'categoryWisePost')->name('category-post');
    Route::get("/tag/{tag:slug}", 'tagWisePost')->name('tag-post');
    Route::get("/author/{user:slug}", 'authorWisePost')->name('author-post');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('{post}/comment/store', 'store')->name('comment.store');
});
