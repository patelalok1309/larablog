<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\SiteOptionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register-user', [UserController::class, 'registerUser'])->name('register.new.user');
Route::post('/store-user', [UserController::class, 'storeUser'])->name('store.new.user');

Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'backpanel'
    ],
    function () {


        Route::view('', 'backpanel.dashboard.index')->name('backpanel.dashboard');


        Route::group(['middleware' => ['role:admin']], function () {

            // User Routes 
            Route::resource('/user', UserController::class);

            // Role Routes
            Route::resource('/role', RoleController::class);

            // Permission Routes
            Route::resource('/permission', PermissionController::class);

            // Assign permissions view
            Route::get('/role/{role}/assign-permission', [RoleController::class, 'assignPermissionView'])->name('role.assign.permission');

            // Store assigned permissions
            Route::post('/role/{role}/assign-permission', [RoleController::class, 'assignPermission'])->name('role.store.permission');
        });


        Route::group(['middleware' => ['role:admin|editor']], function () {


            // Category Route
            Route::resource('/category', CategoryController::class);
            Route::get('/category/trashed', [CategoryController::class, 'trashedCategory'])->name('category.trashed');
            Route::post('/category/{category}/restore', [CategoryController::class, 'restoreCategory'])->name('category.restore');
            Route::delete('/category/{category}/force-delete', [CategoryController::class, 'forceDeleteCategory'])->name('category.force.delete');


            // Tags Route
            Route::resource('/tag', TagController::class);
            Route::get('/tag/trashed', [TagController::class, 'trashedTag'])->name('tag.trashed');
            Route::post('/tag/{tag}/restore', [TagController::class, 'restoreTag'])->name('tag.restore');
            Route::delete('/tag/{tag}/force-delete', [TagController::class, 'forceDeleteTag'])->name('tag.force.delete');

            // Site Setting Controller
            Route::controller(SiteOptionController::class)->group(function () {
                Route::get('/site-settings', 'index')->name('setting.index');
                Route::post('/site-settings', 'store')->name('setting.store');
            });

            // Comments Routes
            Route::get('/comments', [CommentController::class, 'index'])->name('comment.index');
            Route::put('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comment.approve');
            Route::get('/comments/edit/{comment}', [CommentController::class, 'edit'])->name('comment.edit');
            Route::put('/comments/update/{comment}', [CommentController::class, 'update'])->name('comment.update');
            Route::delete('/comments/delete/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
        });


        // Post Routes
        Route::get('/post/trashed', [PostController::class, 'trashedPost'])->name('post.trashed');
        Route::post('/post/{post}/restore', [PostController::class, 'restorePost'])->name('post.restore');
        Route::delete('/post/{post}/force-delete', [PostController::class, 'forceDeletePost'])->name('post.force.delete');
        Route::resource('/post', PostController::class);
        Route::post('/post/upload', [PostController::class, 'uploadPhoto'])->name('post.upload');
    }
);
