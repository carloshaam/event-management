<?php

declare(strict_types=1);

namespace App\Services\Location;

use App\Actions\Location\CreateLocationAction;
use App\DataTransferObjects\Location\CreateLocationDTO;

readonly class CreateLocationService
{
    public function __construct(
        private CreateLocationAction $createLocationAction,
    ) {}

    public function create(array $data, int $eventId): void
    {
        $locationDTO = $this->makeLocationDTO($data, $eventId);

        $this->createLocationAction->execute($locationDTO);
    }

    protected function makeLocationDTO(array $data, int $eventId): CreateLocationDTO
    {
        return new CreateLocationDTO(
            event_id: $eventId,
            zip_code: $data['zip_code'],
            street: $data['street'],
            number: $data['number'],
            complement: $data['complement'],
            neighborhood: $data['neighborhood'],
            city: $data['city'],
            state: $data['state'],
        );
    }
}
