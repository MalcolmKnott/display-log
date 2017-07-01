<?php

namespace Malcolmknott\Displaylog;

use Illuminate\Support\ServiceProvider;

class DisplayLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'displaylog');

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/displaylog'),
        ], 'views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Malcolmknott\Displaylog\DisplayLogController');
    }
}
