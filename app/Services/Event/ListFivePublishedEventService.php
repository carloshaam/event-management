<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\ListFivePublishedEventAction;
use App\Http\Resources\Event\EventCollection;

readonly class ListFivePublishedEventService
{
    public function __construct(
        private ListFivePublishedEventAction $listFivePublishedEventAction,
    ) {}

    public function list(): EventCollection
    {
        return $this->listFivePublishedEventAction->execute();
    }
}
