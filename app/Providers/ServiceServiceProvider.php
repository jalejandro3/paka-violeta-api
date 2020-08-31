<?php

namespace App\Providers;

use App\Services\AuthService as AuthServiceInterface;
use App\Services\Impl\AuthService;
use App\Services\Impl\UserService;
use App\Services\UserService as UserServiceInterface;
use App\Services\Impl\ColorService;
use App\Services\ColorService as ColorServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthServiceInterface::class, AuthService::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(ColorServiceInterface::class, ColorService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
