<?php

namespace Stripe\App;

use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes/web.php';
        include __DIR__ . '/routes/api.php';

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        //register the view
        $this->mergeConfigFrom(__DIR__ . '/config/stripe-app.php', 'stripe-app');
        $this->publishes([
            __DIR__ . '/config/stripe-app.php' => config_path('stripe-app.php'),
            __DIR__ . '/views' => resource_path('views/vendor/'),
        ]);

        //register the view
        $this->loadViewsFrom(resource_path('views/vendor/'), 'stripe-app');

    }

}
