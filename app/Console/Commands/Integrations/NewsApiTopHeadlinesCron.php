<?php

declare(strict_types=1);

namespace App\Console\Commands\Integrations;

use App\DataTransferObjects\News\CreateNewsDTO;
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

        $articlesDTO = [];
        foreach ($response['articles'] as $article) {
            if (is_null($article['source']['id'])) continue;

            $publishedAt = Carbon::parse($article['publishedAt']);

            $articleDTO = new CreateNewsDTO(
                source_slug: $article['source']['id'],
                source_name: $article['source']['name'],
                author: $article['author'],
                title: $article['title'],
                description: $article['description'],
                url: $article['url'],
                url_to_image: $article['urlToImage'],
                published_at: $publishedAt->toDateTimeString(),
                content: $article['content'],
            );

            $articlesDTO[] = $articleDTO;
        }

        $newsService = app(CreateBulkNewsService::class);
        $newsService->create($articlesDTO);
    }
}
