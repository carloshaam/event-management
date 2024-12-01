<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Contracts\News\NewsRepositoryInterface;
use App\Data\News\CreateNewsCollectionData;

final readonly class CreateBulkNewsAction
{
    public function __construct(
        private NewsRepositoryInterface $repository,
    ) {}

    public function execute(CreateNewsCollectionData $data)
    {
        return $this->repository->createBulk($data);
    }
}
