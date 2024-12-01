<?php

declare(strict_types=1);

namespace App\Repositories\Location;

use App\Contracts\Location\LocationRepositoryInterface;
use App\Data\Location\CreateLocationData;
use App\Http\Resources\Location\LocationResource;
use App\Models\Location;

readonly class LocationRepository implements LocationRepositoryInterface
{
    public function __construct(
        private Location $model
    ) {}

    public function create(CreateLocationData $data): LocationResource
    {
        $location = $this->model->newQuery()->create($data->toArray());

        return new LocationResource($location);
    }
}
