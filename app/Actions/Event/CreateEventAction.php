<?php

declare(strict_types=1);

namespace App\Actions\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\Http\Resources\Event\EventResource;

final readonly class CreateEventAction
{
    public function __construct(
        private EventRepositoryInterface $repository,
    ) {}

    public function execute(CreateEventDTO $data): EventResource
    {
        return $this->repository->create($data);
    }
}
