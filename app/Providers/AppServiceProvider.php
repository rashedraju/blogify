<?php

namespace App\Providers;

use App\Services\Newsletter;
use App\Services\PostService;
use App\Services\SessionService;
use App\Services\RegisterService;
use MailchimpMarketing\ApiClient;
use App\Services\VisibilityService;
use Illuminate\Support\Facades\Gate;
use App\Services\MailchimpNewsletter;
use App\Services\PostCommentsService;
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
        app()->bind(PostService::class, fn() => new PostService);
        app()->bind(PostCommentsService::class, fn() => new PostCommentsService);
        app()->bind(RegisterService::class, fn() => new RegisterService(new VisibilityService));
        app()->bind(SessionService::class, fn() => new SessionService);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('visibility', function($user, string $visibilityFor){
            return $user->visibilities[$visibilityFor];
        });
    }
}
