<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use App\Services\PostService;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use MailchimpMarketing\ApiClient;
use App\Services\VisibilityService;
use App\Services\MailchimpNewsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20'
            ]);

            return new MailchimpNewsletter($client);
        });

        app()->bind(VisibilityService::class, fn() => new VisibilityService());
        app()->bind(PostService::class, fn() => new PostService());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        // Observers
        Post::observe(PostObserver::class);
        User::observe(UserObserver::class);
    }
}
