<?php

namespace App\Providers;

use App\Events\NewPostCreated;
use App\Listeners\NewPostFollowersNotification;
use App\Models\Post;
use App\Models\User;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        NewPostCreated::class => [
            NewPostFollowersNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        User::observe(UserObserver::class);
    }
}
