<?php

declare(strict_types=1);

namespace App\Data\Ticket;

final class CreateTicketCollectionData
{
    public function __construct(public array $tickets) {}

    public static function fromArray(array $tickets): self
    {
        return new self(
            array_map(fn($ticket) => CreateTicketData::fromArray($ticket), $tickets)
        );
    }

    public function toArray(): array
    {
        return array_map(fn(CreateTicketData $ticket) => $ticket->toArray(), $this->tickets);
    }

    public function applyEventId(int $eventId): void
    {
        foreach ($this->tickets as $ticket) {
            $ticket->setEventId($eventId);
        }
    }

    public function getTickets(): array
    {
        return $this->tickets;
    }
}
