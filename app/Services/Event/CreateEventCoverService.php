<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\CreateEventCoverAction;
use App\Data\File;
use App\DataTransferObjects\Event\CreateEventDTO;
use App\Exceptions\UploadFileException;
use Throwable;

readonly class CreateEventCoverService
{
    public function __construct(
        private CreateEventCoverAction $createEventCoverAction
    ) {}

    /**
     * @throws UploadFileException
     */
    public function create(CreateEventDTO $dto): ?File
    {
        if (is_null($dto->cover)) {
            return null;
        }

        try {
            return $this->createEventCoverAction->execute($dto->cover);
        } catch (Throwable $e) {
            throw new UploadFileException($e->getMessage());
        }
    }
}
