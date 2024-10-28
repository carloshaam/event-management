<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\CreateEventAction;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\Enums\VisibilityEnum;
use App\Http\Resources\Event\EventResource;

readonly class CreateEventService
{
    public function __construct(
        private CreateEventAction $createEventAction,
    ) {}

    public function create(array $data): EventResource
    {
        $eventDTO = $this->makeEventDTO($data);

        return $this->createEventAction->execute($eventDTO);
    }

    protected function makeEventDTO(array $data): CreateEventDTO
    {
        return new CreateEventDTO(
            visibility: VisibilityEnum::from($data['visibility']),
            title: $data['title'],
            description: $data['description'],
            start_time: $data['start_time'],
            end_time: $data['end_time'],
            category_id: $data['category_id'],
            created_by: $data['created_by'],
        );
    }
}
