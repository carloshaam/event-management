<?php

declare(strict_types=1);

namespace App\Providers\Integrations;

use App\Contracts\Integrations\NewsAPI\NewsApiInterface;
use App\Services\Integrations\NewsApi\NewsApiV2Service;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class NewsApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // TODO: melhorar essa integração
        $this->app->singleton(NewsApiInterface::class, function ($app) {
            $config = $app['config']['services']['newsapi'];

            $client = new Client([
                'base_uri' => $config['api_base_url'],
                'timeout'  => 30,
            ]);

            return new NewsApiV2Service($client);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
