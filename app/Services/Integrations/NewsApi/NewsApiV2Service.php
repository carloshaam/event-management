<?php

declare(strict_types=1);

namespace App\Services\Integrations\NewsApi;

use App\Contracts\Integrations\NewsAPI\NewsApiInterface;
use App\Exceptions\NewsApi\NewsApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewsApiV2Service implements NewsApiInterface
{
    public function __construct(
        public Client $client,
    ) {}

    public function listTopHeadlines(
        string $country = 'us',
        string $category = 'entertainment',
        int $page = 1,
        int $pageSize = 10
    ) {
        try {
            // TODO: usar Http
            $response = $this->client->request(
                'GET',
                '/v2/top-headlines',
                [
                    'headers'  => [
                        'Accept' => 'application/json',
                        'X-Api-Key' =>config('newsapi.api_key'),
                    ],
                    'query' => [
                        'country' => $country,
                        'category' => $category,
                        'page' => $page,
                        'pageSize' => $pageSize,
                    ]
                ]
            );

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            info('News API request failed: ' . $e->getMessage());
            throw new NewsApiException('News API request failed: ', 0, $e);
        }
    }
}
