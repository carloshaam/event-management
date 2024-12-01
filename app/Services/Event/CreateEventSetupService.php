<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Data\Event\CreateEventData;
use App\Data\Event\CreateEventSetupData;
use App\Data\Location\CreateLocationData;
use App\Services\Location\CreateLocationService;
use App\Services\Ticket\CreateBulkTicketService;
use Illuminate\Support\Facades\DB;

final readonly class CreateEventSetupService
{
    public function __construct(
        private CreateEventService $createEventService,
        private CreateLocationService $createLocationService,
        private CreateBulkTicketService $createBulkTicketService
    ) {}

    public function create(CreateEventSetupData $data)
    {
        return DB::transaction(function () use ($data) {
            $event = $this->createEventService->create(new CreateEventData(
                $data->visibility,
                $data->stage,
                $data->cover,
                $data->title,
                $data->description,
                $data->startTime,
                $data->endTime,
                $data->categoryId,
                $data->createdBy,
            ));

            $this->createLocationService->create(new CreateLocationData(
                $event->id,
                $data->location->placeName,
                $data->location->zipCode,
                $data->location->street,
                $data->location->number,
                $data->location->complement,
                $data->location->neighborhood,
                $data->location->city,
                $data->location->state,
            ));

            $data->tickets->applyEventId($event->id);
            $this->createBulkTicketService->create($data->tickets);

            return $event;
        });
    }
}
