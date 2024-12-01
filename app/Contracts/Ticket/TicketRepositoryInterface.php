<?php

declare(strict_types=1);

namespace App\Contracts\Ticket;

use App\Data\Ticket\CreateTicketCollectionData;
use App\Data\Ticket\CreateTicketData;
use App\Http\Resources\Ticket\TicketResource;

interface TicketRepositoryInterface
{
    public function create(CreateTicketData $data): TicketResource;

    public function createBulk(CreateTicketCollectionData $data);
}
