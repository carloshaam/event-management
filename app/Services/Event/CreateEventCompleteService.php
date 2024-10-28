<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\CreateEventAction;
use App\Actions\Location\CreateLocationAction;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\DataTransferObjects\Location\CreateLocationDTO;
use App\Http\Resources\Event\EventResource;
use Illuminate\Support\Facades\DB;

readonly class CreateEventCompleteService
{
    public function __construct(
        private CreateEventAction $createEventAction,
        private CreateLocationAction $createLocationAction,
    ) {}

    public function createEventComplete(array $data)
    {
        return DB::transaction(function () use ($data) {
            $event = $this->createAndStoreEvent($data);

            $this->createAndStoreLocation($data, $event->id);

            return $event;
        });
    }

    protected function createAndStoreEvent(array $data): EventResource
    {
        $eventDTO = $this->makeEventDTO($data);

        return $this->createEventAction->execute($eventDTO);
    }

    protected function createAndStoreLocation(array $data, int $eventId): void
    {
        $locationDTO = $this->makeLocationDTO($data, $eventId);

        $this->createLocationAction->execute($locationDTO);
    }

    protected function makeEventDTO(array $data): CreateEventDTO
    {
        return new CreateEventDTO(
            title: $data['title'],
            description: $data['description'],
            start_time: $data['start_time'],
            end_time: $data['end_time'],
            category_id: $data['category_id'],
            created_by: $data['created_by'],
        );
    }

    protected function makeLocationDTO(array $data, int $eventId): CreateLocationDTO
    {
        return new CreateLocationDTO(
            event_id: $eventId,
            zip_code: $data['zip_code'],
            street: $data['street'],
            number: $data['number'],
            complement: $data['complement'],
            neighborhood: $data['neighborhood'],
            city: $data['city'],
            state: $data['state'],
        );
    }
}
