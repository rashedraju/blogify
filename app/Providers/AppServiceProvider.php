<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use App\Services\VisibilityService;
use Illuminate\Support\Facades\Gate;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Blade;
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

        app()->bind(VisibilityService::class, function(){
            return new VisibilityService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function () {
            return auth()->user() && auth()->user()->is_admin;
        });


        Gate::define('user', function(){
            return auth()->user() && !auth()->user()->is_admin;
        });

        Gate::define('self', function(){
            return auth()->user() && auth()->user()->username == request()->segment(1);
        });

        Gate::define('visibility', function($user, string $visibilityFor){
            return $user->visibilities[$visibilityFor];
        });

        Blade::if('admin', function () {
            return auth()->user() && auth()->user()->is_admin;
        });

        Blade::if('user', function(){
            return auth()->user() && !auth()->user()->is_admin;
        });

        Blade::if('self', function(){
            return auth()->user() && auth()->user()->username == request()->segment(1);
        });
    }
}
