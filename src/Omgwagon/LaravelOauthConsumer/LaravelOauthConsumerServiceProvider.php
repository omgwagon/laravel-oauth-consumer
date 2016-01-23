<?php

namespace Omgwagon\LaravelOauthConsumer;

use Illuminate\Support\ServiceProvider;

class LaravelOauthConsumerServiceProvider extends ServiceProvider {


    /**
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;

    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        $this->package('omgwagon/laravel-oauth-consumer');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['laravel-oauth-consumer'] = $this->app->share( function( $app ) {
            return new OauthConsumer;
        } );
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('OauthConsumer', 'Omgwagon\LaravelOauthConsumer\Facades\OauthConsumer');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('oauth-consumer');
    }

}
