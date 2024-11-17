<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\DataTransferObjects\Event\CreateEventDTO;
use App\DataTransferObjects\Location\CreateLocationDTO;
use App\DataTransferObjects\Location\CreateLocationWithEventDTO;
use App\Services\Location\CreateLocationService;
use Illuminate\Support\Facades\DB;

readonly class CreateEventWithLocationService
{
    public function __construct(
        private CreateEventService $createEventService,
        private CreateLocationService $createLocationService,
    ) {}

    public function create(CreateEventDTO $eventDTO, CreateLocationDTO $locationDTO)
    {
        return DB::transaction(function () use ($eventDTO, $locationDTO) {
            $event = $this->createEventService->create($eventDTO);

            $location = CreateLocationWithEventDTO::fromCreateLocationDTO($locationDTO, $event->id);

            $this->createLocationService->create($location);

            return $event;
        });
    }
}
