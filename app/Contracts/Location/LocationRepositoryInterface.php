<?php

declare(strict_types=1);

namespace App\Contracts\Location;

use App\DataTransferObjects\Location\CreateLocationWithEventDTO;
use App\Http\Resources\Location\LocationResource;

interface LocationRepositoryInterface
{
    public function create(CreateLocationWithEventDTO $data): LocationResource;
}
