<?php

declare(strict_types=1);

namespace App\Support;

use App\Http\Resources\Category\CategoryCollection;

class CategoryForSelectInput
{
    public static function categories(CategoryCollection $categories): array
    {
        return $categories->map(function ($category) {
            return [
                'name' => $category->name,
                'value' => $category->id,
            ];
        })->toArray();
    }
}
