<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\CreateEventAction;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\DataTransferObjects\Event\CreateEventWithCoverDTO;
use App\Exceptions\UploadFileException;
use App\Http\Resources\Event\EventResource;

readonly class CreateEventService
{
    public function __construct(
        private CreateEventAction $createEventAction,
        private CreateEventCoverService $createEventCoverService
    ) {}

    /**
     * @throws UploadFileException
     */
    public function create(CreateEventDTO $dto): EventResource
    {
        $createEventCover = $this->createEventCoverService->create($dto);
        $dtoEventWithCover = CreateEventWithCoverDTO::fromCreateEventDTO($dto, $createEventCover?->getHash());

        return $this->createEventAction->execute($dtoEventWithCover);
    }
}
