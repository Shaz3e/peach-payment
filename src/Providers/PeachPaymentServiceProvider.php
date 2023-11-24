<?php

namespace Shaz3e\PeachPayment\Providers;

use Illuminate\Support\ServiceProvider;
use Shaz3e\PeachPayment\Console\UpdatePeachPaymentConfig;

class PeachPaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Console Commands
         */
        if ($this->app->runningInConsole()) {
            /**
             * Publish Config
             * $command php artisan vendor:publish --tag=peach-payment-config
             */
            $this->publishes([
                __DIR__ . '/../config/peach-payment.php' => config_path('peach-payment.php'),
            ], 'peach-payment-config');

            /**
             * Console Command
             */
            $this->commands([
                UpdatePeachPaymentConfig::class,
            ]);
        }

        /**
         * Load Routes
         */
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        /**
         * Load views
         */
        $this->loadViewsFrom(__DIR__ . '/../views', 'peach-payment');
    }
}
