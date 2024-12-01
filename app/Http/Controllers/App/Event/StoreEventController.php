<?php

declare(strict_types=1);

namespace App\Http\Controllers\App\Event;

use App\Data\Event\CreateEventSetupData;
use App\Http\Requests\Event\StoreEventCompleteRequest;
use App\Services\Event\CreateEventSetupService;

final readonly class StoreEventController
{
    public function __construct(
        private CreateEventSetupService $createEventSetupService
    ) {}

    public function __invoke(StoreEventCompleteRequest $request)
    {
        $createEventData = CreateEventSetupData::fromRequest($request);

        return $this->createEventSetupService->create($createEventData);
    }
}
