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
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['oauth-consumer'] = $this->app->share( function( $app ) {
            return new LaravelOauthConsumer;
        } );
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('OauthConsumer', 'Omgwagon\LaravelOauthConsumer\Facades\OauthConsumer');
        });
    }

}
