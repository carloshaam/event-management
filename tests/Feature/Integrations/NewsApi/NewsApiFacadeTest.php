<?php

declare(strict_types=1);

use App\Facades\Integrations\NewsApiFacade;
use Illuminate\Support\Facades\Http;

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
                'content' => "NEW YORK Se Shohei Ohtani aguentar a dor, ele jogará no Jogo 3 da World Series para os Los Angeles Dodgers.\n\nO gerente Dave Roberts disse na noite de domingo no Yankee Stadium que espera que Ohtani… [+2696 chars]",
            ],
        ],
    ];

    // Fake HTTP response
    Http::fake([
        'https://newsapi.org/v2/top-headlines?country=us&pageSize=10' => Http::response($mockResponse, 200),
    ]);

    // Call the method being tested
    $response = NewsApiFacade::listTopHeadlines('us', 10);

    // Assertions
    expect($response)
        ->toHaveKeys(['status', 'totalResults', 'articles'])
        ->and($response['status'])->toBe('ok')
        ->and($response['totalResults'])->toBe(37);

    $article = $response['articles'][0];
    expect($article)
        ->toHaveKeys(['source', 'author', 'title', 'description', 'url', 'urlToImage', 'publishedAt', 'content'])
        ->and($article['author'])->toBe('Gabe Lacques')
        ->and($article['source']['name'])->toBe('USA TODAY');
});
