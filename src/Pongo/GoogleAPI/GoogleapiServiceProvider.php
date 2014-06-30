<?php namespace Pongo\GoogleAPI;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class GoogleapiServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('pongocms/googleapi');

        // Load facade alias
        AliasLoader::getInstance()->alias(
            'GoogleAPI',
            'Pongo\GoogleAPI\Facades\GoogleAPI'
        );

        require __DIR__.'/../../helpers.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register the config file
        $this->app['config']->package('pongocms/googleapi', __DIR__ . '/../../config');

        // Register the GoogleAPI class
        $this->app['GoogleAPI'] = $this->app->share(function($app)
        {
            return new GoogleAPI($app['session.store'], $app['config'], $app['redirect']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('googleapi');
    }

}
