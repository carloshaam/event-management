<?php

declare(strict_types=1);

namespace App\Http\Controllers\App\Event;

use App\Http\Requests\Event\StoreEventCompleteRequest;
use App\Services\Event\CreateEventCompleteService;

final readonly class StoreEventController
{
    public function __construct(
        private CreateEventCompleteService $createEventCompleteService
    ) {}

    public function __invoke(StoreEventCompleteRequest $request)
    {
        return $this->createEventCompleteService->createEventComplete($request->validated());
    }
}
