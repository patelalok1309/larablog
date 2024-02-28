<?php

use App\Http\Controllers\Blog\FrontController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\UserController;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


// Github login 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/github/register', [UserController::class, 'registerWithGithub']);

// Google login 
Route::get('/google/login', function() {
    return Socialite::driver('google')->redirect();  
})->name('google.login');

Route::get('/google/register', [UserController::class, 'registerWithGoogle']);

// Authentication Routes 
Auth::routes();

Auth::routes(['register' => false]);

Route::permanentRedirect('/home', '/');

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


Route::controller(SearchController::class)->group(function() {
    Route::post('/search/submit', 'handleSearch')->name('search.submit');
});