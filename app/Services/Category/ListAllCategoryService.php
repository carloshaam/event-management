<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Actions\Category\ListAllCategoryAction;
use App\Http\Resources\Category\CategoryCollection;

readonly class ListAllCategoryService
{
    public function __construct(
        private ListAllCategoryAction $listAllCategoryAction,
    ) {}

    public function list(): CategoryCollection
    {
        return $this->listAllCategoryAction->execute();
    }
}
