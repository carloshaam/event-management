<?php

declare(strict_types=1);

namespace App\Repositories\Ticket;

use App\Contracts\Ticket\TicketRepositoryInterface;
use App\Data\Ticket\CreateTicketCollectionData;
use App\Data\Ticket\CreateTicketData;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\Ticket;

readonly class TicketRepository implements TicketRepositoryInterface
{
    public function __construct(
        private Ticket $model
    ) {}

    public function create(CreateTicketData $data): TicketResource
    {
        $event = $this->model->newQuery()->create($data->toArray());

        return new TicketResource($event);
    }

    public function createBulk(CreateTicketCollectionData $data): bool
    {
        return $this->model->newQuery()->insert($data->toArray());
    }
}
