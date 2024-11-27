<?php

declare(strict_types=1);

namespace App\Contracts\Category;

use App\Http\Resources\Category\CategoryCollection;

interface CategoryRepositoryInterface
{
    public function listTenCategories(): CategoryCollection;

    public function listAllCategories(): CategoryCollection;
}
