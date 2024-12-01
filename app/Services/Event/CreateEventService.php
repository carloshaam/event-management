<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\CreateEventAction;
use App\Data\Event\CreateEventData;
use App\Exceptions\UploadFileException;
use App\Http\Resources\Event\EventResource;

final readonly class CreateEventService
{
    public function __construct(
        private CreateEventAction $createEventAction,
        private CreateEventCoverService $createEventCoverService
    ) {}

    /**
     * @throws UploadFileException
     */
    public function create(CreateEventData $data): EventResource
    {
        $createEventCover = $this->createEventCoverService->create($data);
        $data->setCoverHash($createEventCover->getHash());

        return $this->createEventAction->execute($data);
    }
}
