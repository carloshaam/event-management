<?php

declare(strict_types=1);

namespace App\Http\Controllers\App\Event;

use App\DataTransferObjects\Event\CreateEventDTO;
use App\DataTransferObjects\Location\CreateLocationDTO;
use App\Http\Requests\Event\StoreEventCompleteRequest;
use App\Services\Event\CreateEventWithLocationService;

final readonly class StoreEventController
{
    public function __construct(
        private CreateEventWithLocationService $createEventWithLocationService
    ) {}

    public function __invoke(StoreEventCompleteRequest $request)
    {
        $eventDTO = CreateEventDTO::fromRequest($request);
        $locationDTO = CreateLocationDTO::fromRequest($request);

        return $this->createEventWithLocationService->create($eventDTO, $locationDTO);
    }
}
