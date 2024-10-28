<?php

namespace App\Providers;

use App\Contracts\Event\EventRepositoryInterface;
use App\Contracts\Location\LocationRepositoryInterface;
use App\Repositories\Event\EventRepository;
use App\Repositories\Location\LocationRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        /*
         * Tudo rigoroso, indique que os modelos devem evitar carregamento lento
         * Descarte silencioso de atributos e acesso a atributos ausentes.
         */
        Model::shouldBeStrict();

        // Na produção, apenas registre violações de carregamento lento.
        if ($this->app->isProduction()) {
            Model::handleLazyLoadingViolationUsing(function ($model, $relation) {
                $class = get_class($model);

                info("Attempted to lazy load [{$relation}] on model [{$class}].");
            });
        }
    }
}
