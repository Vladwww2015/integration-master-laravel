<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        Route::middleware('web')->group(__DIR__.'/../Routes/admin-routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'integration-master');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'integration-master');
    }

    /**
     * Register services.
     */
    public function register(): void
    {
    }

}
