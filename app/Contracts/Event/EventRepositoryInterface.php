<?php

declare(strict_types=1);

namespace App\Contracts\Event;

use App\DataTransferObjects\Event\CreateEventDTO;
use App\Http\Resources\Event\EventResource;

interface EventRepositoryInterface
{
    public function create(CreateEventDTO $data): EventResource;
}
