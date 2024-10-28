<?php

declare(strict_types=1);

namespace App\Contracts\Integrations\NewsAPI;

interface NewsApiInterface
{
    public function listTopHeadlines(string $country, int $pageSize);
}
