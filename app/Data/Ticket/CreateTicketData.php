<?php

declare(strict_types=1);

namespace App\Data\Ticket;

use Illuminate\Foundation\Http\FormRequest;

final class CreateTicketData
{
    public function __construct(
        public ?int $eventId,
        public string $title,
        public string $quantity,
        public string $price,
        public string $quantityPerOrder,
        public string $startTime,
        public string $endTime,
        public ?string $createdAt,
    ) {}

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            eventId: $request->input('event_id') ?? null,
            title: $request->input('title'),
            quantity: $request->input('quantity'),
            price: $request->input('price'),
            quantityPerOrder: $request->input('quantity_per_order'),
            startTime: $request->input('start_time'),
            endTime: $request->input('end_time'),
            createdAt: $request->input('created_at', now()),
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            eventId: $data['event_id'] ?? null,
            title: $data['title'],
            quantity: $data['quantity'],
            price: $data['price'],
            quantityPerOrder: $data['quantity_per_order'],
            startTime: $data['start_time'],
            endTime: $data['end_time'],
            createdAt: $data['created_at'] ?? now(),
        );
    }

    public function toArray(): array
    {
        return [
            'event_id' => $this->eventId,
            'title' => $this->title,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'quantity_per_order' => $this->quantityPerOrder,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'created_at' => $this->createdAt,
        ];
    }

    public function setEventId(int $eventId): void
    {
        $this->eventId = $eventId;
    }
}
