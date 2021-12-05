<?php

use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::post('/newsletter', NewsletterController::class);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

Route::get("/register", [RegisterController::class, 'create'])->middleware('guest');
Route::post("/register", [RegisterController::class, 'store'])->middleware('guest');

Route::get("/login", [SessionController::class, 'create'])->middleware('guest');
Route::post("/login", [SessionController::class, 'store'])->middleware('guest');

Route::post("/logout", [SessionController::class, 'destroy'])->middleware('auth');

// admin
Route::middleware('can:admin')->group(function(){
    Route::resource('/admin/posts', AdminPostsController::class)->except('show');
});

//Route::middleware('can:admin')->group(function () {
//    Route::get('/admin/posts', [AdminPostsController::class, 'index']);
//    Route::get('/admin/posts/create', [AdminPostsController::class, 'create']);
//    Route::post('/admin/posts', [AdminPostsController::class, 'store']);
//    Route::get('/admin/posts/{post}/edit', [AdminPostsController::class, 'edit']);
//    Route::patch('/admin/posts/{post}', [AdminPostsController::class, 'update']);
//    Route::delete('/admin/posts/{post}', [AdminPostsController::class, 'delete']);
//});
