<?php

declare(strict_types=1);

namespace App\Services\News;

use App\Actions\News\CreateNewsAction;
use App\Data\News\CreateNewsData;
use App\Http\Resources\News\NewsResource;

final readonly class CreateNewsService
{
    public function __construct(
        private CreateNewsAction $createNewsAction,
    ) {}

    public function create(array $data): NewsResource
    {
        $eventDTO = $this->makeNewsDTO($data);

        return $this->createNewsAction->execute($eventDTO);
    }

    protected function makeNewsDTO(array $data): CreateNewsData
    {
        return new CreateNewsData(
            source_slug: $data['source_slug'],
            source_name: $data['source_name'],
            author: $data['author'],
            title: $data['title'],
            description: $data['description'],
            url: $data['url'],
            url_to_image: $data['url_to_image'],
            published_at: $data['published_at'],
        );
    }
}
