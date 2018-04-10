<?php

namespace se468\Reputation;

use Illuminate\Support\ServiceProvider;

class ReputationServiceProvider extends ServiceProvider
{
    
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        $this->loadRoutesFrom(__DIR__."/routes/web.php");
        $this->loadViewsFrom(__DIR__."/resources/views", "Reputation");
        */
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    }
}
