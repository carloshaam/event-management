<?php

declare(strict_types=1);

namespace App\Services\News;

use App\Actions\News\CreateBulkNewsAction;
use App\DataTransferObjects\News\CreateNewsDTO;

readonly class CreateBulkNewsService
{
    public function __construct(
        private CreateBulkNewsAction $createBulkNewsAction,
    ) {}

    public function create(array $data)
    {
        $news = array_map([$this, 'transformToArray'], $data); // TODO: dividir a responsabilidade

        return $this->createBulkNewsAction->execute($news);
    }

    private function transformToArray(CreateNewsDTO $newsDTO): array
    {
        return array_merge($newsDTO->toArray(), [
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
