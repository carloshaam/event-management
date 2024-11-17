<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\ListEventIndividualAction;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventIndividualCollection;

readonly class ListEventIndividualService
{
    public function __construct(
        private ListEventIndividualAction $listEventIndividualAction,
    ) {}

    public function listEventsIndividual(int $userId, array $data = []): EventIndividualCollection
    {
        $filterEventUserDTO = new FilterEventUserDTO(
            title: $data['title'] ?? null,
        );

        return $this->listEventIndividualAction->execute($filterEventUserDTO, $userId);
    }
}
