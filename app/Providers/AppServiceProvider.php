<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use App\Services\PostService;
use App\Services\VisibilityService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        app()->bind( Newsletter::class, function () {
            $client = ( new ApiClient() )->setConfig( [
                'apiKey' => config( 'services.mailchimp.key' ),
                'server' => 'us20'
            ] );

            return new MailchimpNewsletter( $client );
        } );

        app()->bind( VisibilityService::class, fn() => new VisibilityService() );
        app()->bind( PostService::class, fn() => new PostService() );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Model::unguard();
    }
}
