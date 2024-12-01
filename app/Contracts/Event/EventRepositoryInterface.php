<?php

declare(strict_types=1);

namespace App\Contracts\Event;

use App\Data\Event\CreateEventData;
use App\Data\Event\FilterEventData;
use App\Data\Event\FilterEventUserData;
use App\Http\Resources\Event\EventCollection;
use App\Http\Resources\Event\EventIndividualCollection;
use App\Http\Resources\Event\EventResource;

interface EventRepositoryInterface
{
    public function create(CreateEventData $data): EventResource;

    public function listEvents(FilterEventData $data): EventCollection;

    public function listEventsIndividual(FilterEventUserData $data, int $userId): EventIndividualCollection;

    public function listFivePublishedEvent(): EventCollection;
}
