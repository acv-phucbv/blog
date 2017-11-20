<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces;
use App\Services\Production;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register Services
     * @var array
     */
    protected $services = [
        Interfaces\UserServiceInterface::class => Production\UserService::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fix bug default string length for utf8mb4 charset database on windows
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register services
        foreach ($this->services as $inteface => $service) {
            $this->app->singleton($inteface, $service);
        }
    }
}
