<?php

declare(strict_types=1);

namespace App\Repositories\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\Http\Resources\Event\EventResource;
use App\Models\Event;

readonly class EventRepository implements EventRepositoryInterface
{
    public function __construct(
        private Event $model
    ) {}

    public function create(CreateEventDTO $data): EventResource
    {
        $event = $this->model->newQuery()->create($data->toArray());

        return new EventResource($event);
    }
}
