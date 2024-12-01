<?php

declare(strict_types=1);

use App\Contracts\Integrations\NewsAPI\NewsApiInterface;
use App\Facades\Integrations\NewsApiFacade;

it('can get articles from the API', function () {
    $mockResponse = [
        'status' => 'ok',
        'totalResults' => 37,
        'articles' => [
            [
                'source' => ['id' => null, 'name' => 'USA TODAY'],
                'author' => 'Gabe Lacques',
                'title' => "Shohei Ohtani injury update: Dodgers reveal superstar's World Series status for Game 3 - USA TODAY",
                'description' => "Two-time MVP sofreu uma lesão no ombro na vitória dos Dodgers no Jogo 2.",
                'url' => "https://www.usatoday.com/story/sports/mlb/2024/10/27/shohei-ohtani-injury-update-shoulder-dodgers-world-series-status/75879630007/",
                'urlToImage' => "https://www.usatoday.com/gcdn/authoring/authoring-images/2024/10/27/USAT/75879699007-usatsi-24598026.jpg?crop=1536,864,x226,y247&width=1536&height=864&format=pj",
                'publishedAt' => "2024-10-27T22:18:45Z",
            ],
        ],
    ];

    $newsApiMock = Mockery::mock(NewsApiInterface::class);
    $newsApiMock->expects('listTopHeadlines')
                ->with('us', 'business', 1, 10)
                ->andReturns($mockResponse);

    $this->app->instance(NewsApiInterface::class, $newsApiMock);

    $response = NewsApiFacade::listTopHeadlines('us', 'business', 1, 10);

    $this->assertArrayHasKey('status', $response);
    $this->assertEquals('ok', $response['status']);
    $article = $response['articles'][0];
    $this->assertEquals('USA TODAY', $article['source']['name']);
});
