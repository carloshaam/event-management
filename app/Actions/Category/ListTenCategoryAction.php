<?php

declare(strict_types=1);

namespace App\Actions\Category;

use App\Contracts\Category\CategoryRepositoryInterface;
use App\Http\Resources\Category\CategoryCollection;

final readonly class ListTenCategoryAction
{
    public function __construct(
        private CategoryRepositoryInterface $repository,
    ) {}

    public function execute(): CategoryCollection
    {
        return $this->repository->listTenCategories();
    }
}
