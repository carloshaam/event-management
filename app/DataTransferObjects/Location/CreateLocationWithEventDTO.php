<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Location;

readonly class CreateLocationWithEventDTO
{
    public function __construct(
        public int $eventId,
        public string $zipCode,
        public string $street,
        public string $number,
        public ?string $complement,
        public string $neighborhood,
        public string $city,
        public string $state,
    ) {}

    public static function fromCreateLocationDTO(CreateLocationDTO $dto, int $eventId): self
    {
        return new self(
            eventId: $eventId,
            zipCode: $dto->zipCode,
            street: $dto->street,
            number: $dto->number,
            complement: $dto->complement,
            neighborhood: $dto->neighborhood,
            city: $dto->city,
            state: $dto->state,
        );
    }

    public function toArray(): array
    {
        return [
            'event_id' => $this->eventId,
            'zip_code' => $this->zipCode,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'state' => $this->state,
        ];
    }
}