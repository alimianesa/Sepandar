<?php

namespace Alimianesa\Sepandar;

use Illuminate\Support\ServiceProvider;

class SepandarServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'alimianesa');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'alimianesa');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sepandar.php', 'sepandar');

        // Register the service the package provides.
        $this->app->singleton('sepandar', function ($app) {
            return new Sepandar;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sepandar'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/sepandar.php' => config_path('sepandar.php'),
        ], 'sepandar.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/alimianesa'),
        ], 'sepandar.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/alimianesa'),
        ], 'sepandar.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/alimianesa'),
        ], 'sepandar.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
