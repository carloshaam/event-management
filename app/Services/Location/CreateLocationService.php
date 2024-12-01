<?php

declare(strict_types=1);

namespace App\Services\Location;

use App\Actions\Location\CreateLocationAction;
use App\Data\Location\CreateLocationData;
use App\Http\Resources\Location\LocationResource;

final readonly class CreateLocationService
{
    public function __construct(
        private CreateLocationAction $createLocationAction,
    ) {}

    public function create(CreateLocationData $dto): LocationResource
    {
        return $this->createLocationAction->execute($dto);
    }
}
