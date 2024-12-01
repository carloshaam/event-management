<?php

declare(strict_types=1);

namespace App\Console\Commands\Integrations;

use App\Data\News\CreateNewsCollectionData;
use App\Facades\Integrations\NewsApiFacade;
use App\Services\News\CreateBulkNewsService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NewsApiTopHeadlinesCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integrations:newsapi-top-headlines';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Responsável por buscar e atualizar os artigos do top headlines do newsapi.org todo dia.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $response = NewsApiFacade::listTopHeadlines();

        $articles = [];
        foreach ($response['articles'] as $article) {
            if ($article['title'] === '[Removed]') continue;

            $publishedAt = Carbon::parse($article['publishedAt']);

            $articles[] = [
                'source' => $article['source']['name'],
                'title' => $article['title'],
                'url' => $article['url'],
                'url_to_image' => $article['urlToImage'],
                'published_at' => $publishedAt->toDateTimeString(),
            ];
        }

        $newsCollectionData = CreateNewsCollectionData::fromArray($articles);
        $newsService = app(CreateBulkNewsService::class);
        $newsService->create($newsCollectionData);
    }
}
