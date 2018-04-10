<?php

namespace se468\Ratings;

use Illuminate\Support\ServiceProvider;

class RatingsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__."/resources/views", "Ratings");
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
