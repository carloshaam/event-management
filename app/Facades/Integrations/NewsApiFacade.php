<?php

declare(strict_types=1);

namespace App\Facades\Integrations;

use App\Contracts\Integrations\NewsAPI\NewsApiInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static listTopHeadlines(string $country = 'us', string $category = 'entertainment', int $page = 1, int $pageSize = 10)
 */
class NewsApiFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return NewsApiInterface::class;
    }
}
