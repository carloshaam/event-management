<?php

declare(strict_types=1);

namespace App\Contracts\Location;

use App\DataTransferObjects\Location\CreateLocationDTO;
use App\Http\Resources\Location\LocationResource;

interface LocationRepositoryInterface
{
    public function create(CreateLocationDTO $data): LocationResource;
}
