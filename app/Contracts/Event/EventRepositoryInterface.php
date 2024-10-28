<?php

declare(strict_types=1);

namespace App\Contracts\Event;

use App\DataTransferObjects\Event\CreateEventDTO;
use App\DataTransferObjects\Event\FilterEventDTO;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventUserCollection;
use App\Http\Resources\Event\EventResource;

interface EventRepositoryInterface
{
    public function create(CreateEventDTO $data): EventResource;

    public function listEvents(FilterEventDTO $data): EventUserCollection;

    public function listUserEvents(FilterEventUserDTO $data): EventUserCollection;
}
