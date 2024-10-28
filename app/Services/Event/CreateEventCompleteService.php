<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Services\Location\CreateLocationService;
use Illuminate\Support\Facades\DB;

readonly class CreateEventCompleteService
{
    public function __construct(
        private CreateEventService $createEventService,
        private CreateLocationService $createLocationService,
    ) {}

    public function createEventComplete(array $data)
    {
        return DB::transaction(function () use ($data) {
            $event = $this->createEventService->create($data);

            $this->createLocationService->create($data, $event->id);

            return $event;
        });
    }
}
