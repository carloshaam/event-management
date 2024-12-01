<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\ListEventIndividualAction;
use App\Data\Event\FilterEventUserData;
use App\Http\Resources\Event\EventIndividualCollection;

final readonly class ListEventIndividualService
{
    public function __construct(
        private ListEventIndividualAction $listEventIndividualAction,
    ) {}

    public function listEventsIndividual(int $userId, array $data = []): EventIndividualCollection
    {
        $filterEventUserData = new FilterEventUserData(
            title: $data['title'] ?? null,
        );

        return $this->listEventIndividualAction->execute($filterEventUserData, $userId);
    }
}
