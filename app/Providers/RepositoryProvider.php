<?php

namespace App\Providers;

use App\Repositoryes\Blog\BlogRepository;
use App\Repositoryes\Blog\BlogRepositoryInterface;
use App\Repositoryes\Brand\BrandRepository;
use App\Repositoryes\Brand\BrandRepositoryInterface;
use App\Repositoryes\Comment\CommentRepository;
use App\Repositoryes\Comment\CommentRepositoryInterface;
use App\Repositoryes\Product\ProductRepository;
use App\Repositoryes\Product\ProductRepositoryInterface;
use App\Repositoryes\User\UserRepository;
use App\Repositoryes\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use function Psy\bin;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BrandRepositoryInterface::class,BrandRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
