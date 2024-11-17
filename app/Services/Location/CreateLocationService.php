<?php

declare(strict_types=1);

namespace App\Services\Location;

use App\Actions\Location\CreateLocationAction;
use App\DataTransferObjects\Location\CreateLocationWithEventDTO;

readonly class CreateLocationService
{
    public function __construct(
        private CreateLocationAction $createLocationAction,
    ) {}

    public function create(CreateLocationWithEventDTO $dto): void
    {
        $this->createLocationAction->execute($dto);
    }
}
