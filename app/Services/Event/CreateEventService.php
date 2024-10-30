<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\CreateEventAction;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\Http\Resources\Event\EventResource;

readonly class CreateEventService
{
    public function __construct(
        private CreateEventAction $createEventAction,
    ) {}

    public function create(CreateEventDTO $dto): EventResource
    {
        return $this->createEventAction->execute($dto);
    }
}
