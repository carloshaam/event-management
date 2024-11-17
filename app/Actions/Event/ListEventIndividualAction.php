<?php

declare(strict_types=1);

namespace App\Actions\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventIndividualCollection;

final readonly class ListEventIndividualAction
{
    public function __construct(
        private EventRepositoryInterface $repository,
    ) {}

    public function execute(FilterEventUserDTO $data, int $userId): EventIndividualCollection
    {
        return $this->repository->listEventsIndividual($data, $userId);
    }
}
