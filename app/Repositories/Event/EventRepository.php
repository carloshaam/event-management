<?php

declare(strict_types=1);

namespace App\Repositories\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\DataTransferObjects\Event\FilterEventDTO;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventResource;
use App\Http\Resources\Event\EventUserCollection;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

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

    public function listEvents(FilterEventDTO $data): EventUserCollection
    {
        $events = $this->model->newQuery();

        $events->with(['category', 'location']);

        if ($data->title) {
            $events->where('title', 'like', "%{$data->title}%");
        }

        return new EventUserCollection($events->paginate());
    }

    public function listUserEvents(FilterEventUserDTO $data): EventUserCollection
    {
        $events = $this->model->newQuery();

        $events->with(['category', 'location']);

        $events->where('created_by', '=', Auth::id());

        if ($data->title) {
            $events->where('title', 'like', "%{$data->title}%");
        }

        return new EventUserCollection($events->paginate());
    }
}
