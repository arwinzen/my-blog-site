<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// post routes
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('comments');

// routes for registering a user
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// routes for login
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Group all admin routes
Route::middleware('can:admin')->group(function (){
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [AdminPostController::class, 'store']);
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy']);
});

// admin routes
//Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin')->name('createPost');
//Route::post('/admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
//Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware('admin')->name('allPosts');
//Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin')->name('editPost');
//Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin')->name('updatePost');
//Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');


// alternatively using the admin gate closure
//Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin')->name('createPost');
