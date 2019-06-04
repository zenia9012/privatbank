<?php

namespace Yevhenii\PrivatBank;

use Illuminate\Support\ServiceProvider;

class PrivatBankServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'yevhenii');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'yevhenii');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
        $this->mergeConfigFrom(__DIR__.'/../config/privatbank.php', 'privatbank');

        // Register the service the package provides.
        $this->app->singleton('privatbank', function ($app) {
            return new PrivatBank;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['privatbank'];
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
            __DIR__.'/../config/privatbank.php' => config_path('privatbank.php'),
        ], 'privatbank.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/yevhenii'),
        ], 'privatbank.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/yevhenii'),
        ], 'privatbank.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/yevhenii'),
        ], 'privatbank.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
