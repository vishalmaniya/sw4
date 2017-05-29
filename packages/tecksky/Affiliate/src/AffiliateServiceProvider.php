<?php

namespace Tecksky\Affiliate;

use Illuminate\Support\ServiceProvider;

class AffiliateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        require __DIR__ . '/Http/routes.php';
        $this->publishes([
            __DIR__.'/migrations/' => base_path('/database/migrations'),
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/Http/routes.php';
//        $this->app->make('Tecksky\Affiliate\src\Http\AffiliateController');
    }
}
