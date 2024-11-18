<?php

namespace App\Providers;

use App\Contracts\Category\CategoryRepositoryInterface;
use App\Contracts\Event\EventRepositoryInterface;
use App\Contracts\Location\LocationRepositoryInterface;
use App\Contracts\News\NewsRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Event\EventRepository;
use App\Repositories\Location\LocationRepository;
use App\Repositories\News\NewsRepository;
use Illuminate\Support\ServiceProvider;

class DIServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
