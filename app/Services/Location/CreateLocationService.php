<?php

declare(strict_types=1);

namespace App\Services\Location;

use App\Actions\Location\CreateLocationAction;
use App\DataTransferObjects\Location\CreateLocationDTO;

readonly class CreateLocationService
{
    public function __construct(
        private CreateLocationAction $createLocationAction,
    ) {}

    public function create(CreateLocationDTO $dto): void
    {
        $this->createLocationAction->execute($dto);
    }
}
