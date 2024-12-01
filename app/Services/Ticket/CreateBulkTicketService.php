<?php

declare(strict_types=1);

namespace App\Services\Ticket;

use App\Actions\Ticket\CreateBulkTicketAction;
use App\Data\Ticket\CreateTicketCollectionData;

final readonly class CreateBulkTicketService
{
    public function __construct(
        private CreateBulkTicketAction $createBulkTicketAction,
    ) {}

    public function create(CreateTicketCollectionData $data)
    {
        return $this->createBulkTicketAction->execute($data);
    }
}
