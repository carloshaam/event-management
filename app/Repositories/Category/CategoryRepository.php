<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\Contracts\Category\CategoryRepositoryInterface;
use App\Http\Resources\Category\CategoryCollection;
use App\Models\Category;

readonly class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        private Category $model
    ) {}

    public function listTenCategories(): CategoryCollection
    {
        $events = $this->model->newQuery()->take(10)->get();

        return new CategoryCollection($events);
    }

    public function listAllCategories(): CategoryCollection
    {
        $events = $this->model->newQuery()->get();

        return new CategoryCollection($events);
    }
}
