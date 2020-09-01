<?php

namespace App\Providers;

use App\Services\AuthService as AuthServiceInterface;
use App\Services\Impl\AuthService;
use App\Services\Impl\UserService;
use App\Services\UserService as UserServiceInterface;
use App\Services\Impl\ColorService;
use App\Services\ColorService as ColorServiceInterface;
use App\Services\Impl\CategoryService;
use App\Services\CategoryService as CategoryServiceInterface;
use App\Services\Impl\CategorySizeService;
use App\Services\CategorySizeService as CategorySizeServiceInterface;
use App\Services\Impl\PostService;
use App\Services\PostService as PostServiceInterface;
use App\Services\Impl\PostTransactionService;
use App\Services\PostTransactionService as PostTransactionServiceInterface;
use App\Services\Impl\ProductService;
use App\Services\ProductService as ProductServiceInterface;
use App\Services\Impl\ProductTransactionService;
use App\Services\ProductTransactionService as ProductTransactionServiceInterface;
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
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(CategorySizeServiceInterface::class, CategorySizeService::class);
        $this->app->singleton(PostServiceInterface::class, PostService::class);
        $this->app->singleton(PostTransactionServiceInterface::class, PostTransactionService::class);
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
        $this->app->singleton(ProductTransactionServiceInterface::class, ProductTransactionService::class);
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
