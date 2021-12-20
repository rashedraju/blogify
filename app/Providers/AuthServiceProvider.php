<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function () {
            return auth()->user() && auth()->user()->is_admin;
        });

        Gate::define('self', function(){
            return auth()->user() && auth()->user()->username == request()->segment(1);
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
