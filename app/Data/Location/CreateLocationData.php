<?php

declare(strict_types=1);

namespace App\Data\Location;

use Illuminate\Foundation\Http\FormRequest;

final class CreateLocationData
{
    public function __construct(
        public ?int $eventId,
        public string $placeName,
        public string $zipCode,
        public string $street,
        public string $number,
        public ?string $complement,
        public string $neighborhood,
        public string $city,
        public string $state,
    ) {}

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            eventId: $request->input('event_id'),
            placeName: $request->input('place_name'),
            zipCode: $request->input('zip_code'),
            street: $request->input('street'),
            number: $request->input('number'),
            complement: $request->input('complement'),
            neighborhood: $request->input('neighborhood'),
            city: $request->input('city'),
            state: $request->input('state'),
        );
    }

    public function toArray(): array
    {
        return [
            'event_id' => $this->eventId,
            'place_name' => $this->placeName,
            'zip_code' => $this->zipCode,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'state' => $this->state,
        ];
    }

    public function setEventId(int $eventId): void
    {
        $this->eventId = $eventId;
    }
}
