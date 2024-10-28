<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Contracts\News\NewsRepositoryInterface;
use App\DataTransferObjects\News\CreateNewsDTO;

/**
 * @template T of CreateNewsDTO
 */
final readonly class CreateBulkNewsAction
{
    public function __construct(
        private NewsRepositoryInterface $repository,
    ) {}

    /**
     * @param T[] $data
     */
    public function execute(array $data)
    {
        return $this->repository->createBulk($data);
    }
}
