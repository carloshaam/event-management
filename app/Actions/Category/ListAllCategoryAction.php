<?php

declare(strict_types=1);

namespace App\Actions\Category;

use App\Contracts\Category\CategoryRepositoryInterface;
use App\Http\Resources\Category\CategoryCollection;

final readonly class ListAllCategoryAction
{
    public function __construct(
        private CategoryRepositoryInterface $repository,
    ) {}

    public function execute(): CategoryCollection
    {
        return $this->repository->listAllCategories();
    }
}
