<?php

namespace App\Providers;

use App\Repositories\UserRepository as UserRepositoryInterface;
use App\Repositories\Impl\UserRepository;

use App\Repositories\ColorRepository as ColorRepositoryInterface;
use App\Repositories\Impl\ColorRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(ColorRepositoryInterface::class, ColorRepository::class);
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
