<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\ListEventIndividualAction;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventUserCollection;

readonly class ListEventIndividualService
{
    public function __construct(
        private ListEventIndividualAction $listEventIndividualAction,
    ) {}

    public function listUserEvents(array $data = []): EventUserCollection
    {
        $filterEventUserDTO = new FilterEventUserDTO(
            title: $data['title'] ?? null,
        );

        return $this->listEventIndividualAction->execute($filterEventUserDTO);
    }
}
