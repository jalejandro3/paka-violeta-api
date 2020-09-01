<?php

namespace App\Providers;

use App\Repositories\UserRepository as UserRepositoryInterface;
use App\Repositories\Impl\UserRepository;
use App\Repositories\ColorRepository as ColorRepositoryInterface;
use App\Repositories\Impl\ColorRepository;
use App\Repositories\CategoryRepository as CategoryRepositoryInterface;
use App\Repositories\Impl\CategoryRepository;
use App\Repositories\CategorySizeRepository as CategorySizeRepositoryInterface;
use App\Repositories\Impl\CategorySizeRepository;
use App\Repositories\PostRepository as PostRepositoryInterface;
use App\Repositories\Impl\PostRepository;
use App\Repositories\PostTransactionRepository as PostTransactionRepositoryInterface;
use App\Repositories\Impl\PostTransactionRepository;
use App\Repositories\ProductRepository as ProductRepositoryInterface;
use App\Repositories\Impl\ProductRepository;
use App\Repositories\ProductTransactionRepository as ProductTransactionRepositoryInterface;
use App\Repositories\Impl\ProductTransactionRepository;
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
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(CategorySizeRepositoryInterface::class, CategorySizeRepository::class);
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
        $this->app->singleton(PostTransactionRepositoryInterface::class, PostTransactionRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(ProductTransactionRepositoryInterface::class, ProductTransactionRepository::class);
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
