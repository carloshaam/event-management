<?php

declare(strict_types=1);

namespace App\Actions\Event;

use App\Contracts\Event\EventRepositoryInterface;
use App\Http\Resources\Event\EventCollection;

final readonly class ListFivePublishedEventAction
{
    public function __construct(
        private EventRepositoryInterface $repository,
    ) {}

    public function execute(): EventCollection
    {
        return $this->repository->listFivePublishedEvent();
    }
}
