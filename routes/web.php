<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\FollowingsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\VisibilityController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\SendCampaignController;
use App\Http\Controllers\TemplatesController;

// Post
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');

// Feed
Route::get('/feed', [FeedController::class, 'feed']);

// Newsletter
Route::post('/newsletter', NewsletterController::class);

// Profile
Route::get('/{user:username}/profile', [ProfileController::class, 'show']);
Route::get('/{user:username}/followings', [FollowingsController::class, 'index']);
Route::get('/{user:username}/followers', [FollowersController::class, 'index']);
Route::get('/{user:username}/bookmarks', [BookmarksController::class, 'index']);

// Only For Current Logedin User
Route::middleware('can:self')->group(function(){
    Route::patch('/{user:username}/profile/edit', [ProfileController::class, 'update']);

    Route::get('/{user:username}/visibilities', [VisibilityController::class, 'index']);
    Route::put('/{user:username}/visibilities', [VisibilityController::class, 'update']);

    // Followings
    Route::post('/{user:username}/followings/{id}', [FollowingsController::class, 'follow']);
    Route::delete('/{user:username}/followings/{id}', [FollowingsController::class, 'unfollow']);

    // Followers
    Route::delete('/{user:username}/followers/{id}', [FollowersController::class, 'remove']);

    // Bookmarks
    Route::post('/{user:username}/bookmarks', [BookmarksController::class, 'create']);
    Route::delete('/{user:username}/bookmarks/{bookmark}', [BookmarksController::class, 'destory']);

    // Notification
    Route::delete('/{user:username}/notifications', [NotificationsController::class, 'destory']);
});

// Authenticated User
Route::middleware('auth')->group(function(){
    Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
    Route::post("/logout", [SessionController::class, 'destroy']);
});

// Guest
Route::middleware('guest')->group(function(){
    // Register
    Route::get("/register", [RegisterController::class, 'create']);
    Route::post("/register", [RegisterController::class, 'store']);

    // Session
    Route::get("/login", [SessionController::class, 'create']);
    Route::post("/login", [SessionController::class, 'store']);
});

// Admin
Route::middleware('admin')->group(function(){

    Route::resource('/admin/posts', AdminPostsController::class, ['as' => 'admin'])->except('show');

    Route::resource('/admin/newsletters/campaigns', CampaignsController::class)->only(['index', 'show', 'destroy']);

    Route::post('/admin/newsletters/campaigns/{id}/send', SendCampaignController::class);

});


