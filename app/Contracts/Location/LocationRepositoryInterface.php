<?php

declare(strict_types=1);

namespace App\Contracts\Location;

use App\Data\Location\CreateLocationData;
use App\Http\Resources\Location\LocationResource;

interface LocationRepositoryInterface
{
    public function create(CreateLocationData $data): LocationResource;
}
