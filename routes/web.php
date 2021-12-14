<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\FollowingsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\VisibilityController;
use App\Http\Controllers\PostCommentsController;

// Post
Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

// Feed
Route::get('/feed', [FeedController::class, 'feed']);

// Newsletter
Route::post('/newsletter', NewsletterController::class);

// Profile
Route::get('/{user:username}/profile', [ProfileController::class, 'index']);
Route::get('/{user:username}/followings', [FollowingsController::class, 'index']);
Route::get('/{user:username}/followers', [FollowersController::class, 'index']);

Route::middleware('can:self')->group(function(){
    Route::get('/{user:username}/visibilities', [VisibilityController::class, 'index']);
    Route::put('/{user:username}/visibilities', [VisibilityController::class, 'update']);

    // Followings
    Route::post('/{user:username}/followings/{id}', [FollowingsController::class, 'follow']);
    Route::delete('/{user:username}/followings/{id}', [FollowingsController::class, 'unfollow']);

    // Followers
    Route::delete('/{user:username}/followers/{id}', [FollowersController::class, 'remove']);

});

// Register
Route::middleware('guest')->group(function(){
    Route::get("/register", [RegisterController::class, 'create']);
    Route::post("/register", [RegisterController::class, 'store']);

    // Session
    Route::get("/login", [SessionController::class, 'create']);
    Route::post("/login", [SessionController::class, 'store']);
});

Route::post("/logout", [SessionController::class, 'destroy']);

// Admin
Route::middleware('can:admin')->group(function(){
    Route::resource('/admin/posts', AdminPostsController::class)->except('show');
});

