<?php

declare(strict_types=1);

namespace App\Services\Event;

use App\Actions\Event\CreateEventCoverAction;
use App\Data\Event\CreateEventData;
use App\Exceptions\UploadFileException;
use App\Support\File;
use Throwable;

final readonly class CreateEventCoverService
{
    public function __construct(
        private CreateEventCoverAction $createEventCoverAction
    ) {}

    /**
     * @throws UploadFileException
     */
    public function create(CreateEventData $data): ?File
    {
        if (is_null($data->cover)) {
            return null;
        }

        try {
            return $this->createEventCoverAction->execute($data->cover);
        } catch (Throwable $e) {
            throw new UploadFileException($e->getMessage());
        }
    }
}
