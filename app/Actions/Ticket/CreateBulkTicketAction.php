<?php

declare(strict_types=1);

namespace App\Actions\Ticket;

use App\Contracts\Ticket\TicketRepositoryInterface;
use App\Data\Ticket\CreateTicketCollectionData;

final readonly class CreateBulkTicketAction
{
    public function __construct(
        private TicketRepositoryInterface $repository,
    ) {}

    public function execute(CreateTicketCollectionData $data)
    {
        return $this->repository->createBulk($data);
    }
}
