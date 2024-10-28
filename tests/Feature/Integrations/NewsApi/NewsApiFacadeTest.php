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
                'description' => "Two-time MVP suffered a shoulder injury in the Dodgers' Game 2 win.",
                'url' => "https://www.usatoday.com/story/sports/mlb/2024/10/27/shohei-ohtani-injury-update-shoulder-dodgers-world-series-status/75879630007/",
                'urlToImage' => "https://www.usatoday.com/gcdn/authoring/authoring-images/2024/10/27/USAT/75879699007-usatsi-24598026.jpg?crop=1536,864,x226,y247&width=1536&height=864&format=pj",
                'publishedAt' => "2024-10-27T22:18:45Z",
                'content' => "NEW YORK If Shohei Ohtani can handle the pain, he will play in Game 3 of the World Series for the Los Angeles Dodgers.\n\nManager Dave Roberts said Sunday night at Yankee Stadium that he expects Ohtani… [+2696 chars]",
            ],
        ],
    ];

    Http::fake([
        'https://api.example.com/v1/some-data?country=us&pageSize=10' => Http::response($mockResponse, 200),
    ]);

    $response = NewsApiFacade::listTopHeadlines('us', 10);

    expect($response)
        ->toHaveKeys(['status', 'totalResults', 'articles'])
        ->and($response['status'])->toBe('ok')
        ->and($response['totalResults'])->toBe(37);

    $article = $response['articles'][0];
    expect($article)
        ->toHaveKeys(['source', 'author', 'title', 'description', 'url', 'urlToImage', 'publishedAt', 'content'])
        ->and($article['author'])->toBe('Gabe Lacques')
        ->and($article['title'])->toBe(
            "Shohei Ohtani injury update: Dodgers reveal superstar's World Series status for Game 3 - USA TODAY",
        )
        ->and($article['url'])->toBe(
            "https://www.usatoday.com/story/sports/mlb/2024/10/27/shohei-ohtani-injury-update-shoulder-dodgers-world-series-status/75879630007/",
        );
});
