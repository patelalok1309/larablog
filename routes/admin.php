<?php

use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/backpanel', 'backpanel.dashboard.index')->name('backpanel.dashboard');

// User Routes 
Route::resource('/backpanel/user', UserController::class);

// Role Routes
Route::resource('/backpanel/role', RoleController::class);

// Permission Routes
Route::resource('/backpanel/permission', PermissionController::class);

// Assign permissions view
Route::get('/backpanel/role/{role}/assign-permission', [RoleController::class, 'assignPermissionView'])->name('role.assign.permission');

// Store assigned permissions
Route::post('/backpanel/role/{role}/assign-permission', [RoleController::class, 'assignPermission'])->name('role.store.permission');

// Category Route
Route::resource('/backpanel/category', CategoryController::class);

// Trashed Categories Route
Route::get('/category/trashed', [CategoryController::class, 'trashedCategory'])->name('category.trashed');
Route::post('/category/{category}/restore', [CategoryController::class, 'restoreCategory'])->name('category.restore');
Route::delete('/category/{category}/force-delete', [CategoryController::class, 'forceDeleteCategory'])->name('category.force.delete');


// Post Routes
Route::resource('/backpanel/post' , PostController::class);
Route::get('/post/trashed', [PostController::class, 'trashedPost'])->name('post.trashed');
Route::post('/post/{post}/restore', [PostController::class, 'restorePost'])->name('post.restore');
Route::delete('/post/{post}/force-delete', [PostController::class, 'forceDeletePost'])->name('post.force.delete');
Route::post('/backpanel/post/upload' ,[PostController::class , 'uploadPhoto'])->name('post.upload');