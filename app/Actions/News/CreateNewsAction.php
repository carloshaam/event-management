<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Contracts\News\NewsRepositoryInterface;
use App\Data\News\CreateNewsData;
use App\Http\Resources\News\NewsResource;

final readonly class CreateNewsAction
{
    public function __construct(
        private NewsRepositoryInterface $repository,
    ) {}

    public function execute(CreateNewsData $data): NewsResource
    {
        return $this->repository->create($data);
    }
}
