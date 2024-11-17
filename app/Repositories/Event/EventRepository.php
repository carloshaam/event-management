<?php

declare(strict_types=1);

namespace App\Repositories\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\DataTransferObjects\Event\CreateEventWithCoverDTO;
use App\DataTransferObjects\Event\FilterEventDTO;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventCollection;
use App\Http\Resources\Event\EventResource;
use App\Http\Resources\Event\EventIndividualCollection;
use App\Models\Event;

readonly class EventRepository implements EventRepositoryInterface
{
    public function __construct(
        private Event $model
    ) {}

    public function create(CreateEventWithCoverDTO $data): EventResource
    {
        $event = $this->model->newQuery()->create($data->toArray());

        return new EventResource($event);
    }

    public function listEvents(FilterEventDTO $data): EventCollection
    {
        $events = $this->model->newQuery()->with(['category', 'location'])->published();

        if ($data->title) {
            $events->where('title', 'like', "%{$data->title}%");
        }

        return new EventCollection($events->paginate());
    }

    public function listEventsIndividual(FilterEventUserDTO $data, $userId): EventIndividualCollection
    {
        $events = $this->model->newQuery()->with(['category', 'location'])->createdBy($userId);

        if ($data->title) {
            $events->where('title', 'like', "%{$data->title}%");
        }

        return new EventIndividualCollection($events->paginate());
    }
}
