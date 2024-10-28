<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Actions\Category\ListTenCategoryAction;
use App\Http\Resources\Category\CategoryCollection;
use Illuminate\Support\Facades\Cache;

readonly class ListTenCategoryService
{
    public function __construct(
        private ListTenCategoryAction $listTenCategoryAction,
    ) {}

    public function list(): CategoryCollection
    {
        return Cache::remember(
            'list_ten_categories',
            3600,
            fn () => $this->listTenCategoryAction->execute()
        );
    }
}
