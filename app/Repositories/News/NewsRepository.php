<?php

declare(strict_types=1);

namespace App\Repositories\News;

use App\Contracts\News\NewsRepositoryInterface;
use App\Data\News\CreateNewsCollectionData;
use App\Data\News\CreateNewsData;
use App\Http\Resources\News\NewsResource;
use App\Models\News;

readonly class NewsRepository implements NewsRepositoryInterface
{
    public function __construct(
        private News $model
    ) {}

    public function create(CreateNewsData $data): NewsResource
    {
        $event = $this->model->newQuery()->create($data->toArray());

        return new NewsResource($event);
    }

    public function createBulk(CreateNewsCollectionData $data): bool
    {
        return $this->model->newQuery()->insert($data->toArray());
    }
}
