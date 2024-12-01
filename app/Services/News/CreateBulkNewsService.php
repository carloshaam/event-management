<?php

declare(strict_types=1);

namespace App\Services\News;

use App\Actions\News\CreateBulkNewsAction;
use App\Data\News\CreateNewsCollectionData;
use App\Data\News\CreateNewsData;

final readonly class CreateBulkNewsService
{
    public function __construct(
        private CreateBulkNewsAction $createBulkNewsAction,
    ) {}

    public function create(CreateNewsCollectionData $data)
    {
        return $this->createBulkNewsAction->execute($data);
    }
}
