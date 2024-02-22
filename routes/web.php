<?php

use App\Http\Controllers\Blog\FrontController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require 'admin.php';

// Role Routes 
Route::get('/add-roles', function () {

    $roles = [
        ['name' => 'writer', 'guard_name' => 'web'],
        ['name' => 'author', 'guard_name' => 'web'],
        ['name' => 'editor', 'guard_name' => 'web'],
    ];
    $role = Role::insert($roles);
    return "success";
    
})->name('add.roles');



Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'allPost')->name('blog.home');
    Route::get('/{post:slug}' , 'singlePost')->name('single.post');
    Route::get("/category/{category:slug}", 'categoryWisePost')->name('category-post');
});

Route::controller(CommentController::class)->group(function() {
    Route::post('{post}/comment/store' , 'store')->name('comment.store');
});