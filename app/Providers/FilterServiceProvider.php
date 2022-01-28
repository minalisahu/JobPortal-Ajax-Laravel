<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filters\FilterService;

class FilterServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FilterService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
