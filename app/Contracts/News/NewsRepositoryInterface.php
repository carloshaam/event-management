<?php

declare(strict_types=1);

namespace App\Contracts\News;

use App\Data\News\CreateNewsCollectionData;
use App\Data\News\CreateNewsData;
use App\Http\Resources\News\NewsResource;

interface NewsRepositoryInterface
{
    public function create(CreateNewsData $data): NewsResource;

    public function createBulk(CreateNewsCollectionData $data);
}
