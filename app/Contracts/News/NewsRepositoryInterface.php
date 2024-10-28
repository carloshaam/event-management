<?php

declare(strict_types=1);

namespace App\Contracts\News;

use App\DataTransferObjects\News\CreateNewsDTO;
use App\Http\Resources\News\NewsResource;

interface NewsRepositoryInterface
{
    public function create(CreateNewsDTO $data): NewsResource;

    public function createBulk(array $data);
}
