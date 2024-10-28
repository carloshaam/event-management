<?php

declare(strict_types=1);

namespace App\Facades\Integrations;

use App\Contracts\Integrations\NewsAPI\NewsApiInterface;
use Illuminate\Support\Facades\Facade;

class NewsApiFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return NewsApiInterface::class;
    }
}
