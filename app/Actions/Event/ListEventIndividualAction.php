<?php

declare(strict_types=1);

namespace App\Actions\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\DataTransferObjects\Event\FilterEventUserDTO;
use App\Http\Resources\Event\EventUserCollection;

final readonly class ListEventIndividualAction
{
    public function __construct(
        private EventRepositoryInterface $repository,
    ) {}

    public function execute(FilterEventUserDTO $data): EventUserCollection
    {
        return $this->repository->listUserEvents($data);
    }
}
