<?php

declare(strict_types=1);

namespace App\Actions\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\Data\Event\CreateEventData;
use App\Http\Resources\Event\EventResource;

final readonly class CreateEventAction
{
    public function __construct(
        private EventRepositoryInterface $repository,
    ) {}

    public function execute(CreateEventData $data): EventResource
    {
        return $this->repository->create($data);
    }
}
