<?php

declare(strict_types=1);

namespace App\Repositories\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\Data\Event\CreateEventData;
use App\Data\Event\FilterEventData;
use App\Data\Event\FilterEventUserData;
use App\Http\Resources\Event\EventCollection;
use App\Http\Resources\Event\EventResource;
use App\Http\Resources\Event\EventIndividualCollection;
use App\Models\Event;

readonly class EventRepository implements EventRepositoryInterface
{
    public function __construct(
        private Event $model
    ) {}

    public function create(CreateEventData $data): EventResource
    {
        $event = $this->model->newQuery()->create($data->toArray());

        return new EventResource($event);
    }

    public function listEvents(FilterEventData $data): EventCollection
    {
        $events = $this->model->newQuery()->with(['category', 'location', 'tickets'])->published();

        if ($data->title) {
            $events->where(column: 'title', operator: 'like', value: "%{$data->title}%");
        }

        return new EventCollection($events->paginate());
    }

    public function listEventsIndividual(FilterEventUserData $data, $userId): EventIndividualCollection
    {
        $events = $this->model->newQuery()->with(['category', 'location', 'tickets'])->createdBy($userId);

        if ($data->title) {
            $events->where(column: 'title', operator: 'like', value: "%{$data->title}%");
        }

        return new EventIndividualCollection($events->paginate());
    }

    public function listFivePublishedEvent(): EventCollection
    {
        $events = $this->model->newQuery()
                              ->with(['category', 'location', 'tickets'])
                              ->public()
                              ->published()
                              ->orderByDesc('id')
                              ->take(5)
                              ->get();

        return new EventCollection($events);
    }
}
