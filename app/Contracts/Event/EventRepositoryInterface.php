<?php

declare(strict_types=1);

namespace App\Contracts\Event;

use App\DataTransferObjects\Event\CreateEventWithCoverDTO;
use App\DataTransferObjects\Event\FilterEventDTO;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventCollection;
use App\Http\Resources\Event\EventIndividualCollection;
use App\Http\Resources\Event\EventResource;

interface EventRepositoryInterface
{
    public function create(CreateEventWithCoverDTO $data): EventResource;

    public function listEvents(FilterEventDTO $data): EventCollection;

    public function listEventsIndividual(FilterEventUserDTO $data, int $userId): EventIndividualCollection;

    public function listFivePublishedEvent(): EventCollection;
}
