<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Location;

readonly class CreateLocationDTO
{
    public function __construct(
        public int $event_id,
        public string $zip_code,
        public string $street,
        public string $number,
        public null|string $complement,
        public string $neighborhood,
        public string $city,
        public string $state,
    ) {}

    public function toArray(): array
    {
        return [
            'event_id' => $this->event_id,
            'zip_code' => $this->zip_code,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'state' => $this->state,
        ];
    }
}
