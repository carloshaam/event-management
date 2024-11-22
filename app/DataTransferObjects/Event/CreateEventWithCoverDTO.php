<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Event;

use App\Enums\StageEnum;
use App\Enums\VisibilityEnum;

final class CreateEventWithCoverDTO
{
    public function __construct(
        public VisibilityEnum $visibility,
        public StageEnum $stage,
        public ?string $cover,
        public string $title,
        public string $description,
        public string $startTime,
        public string $endTime,
        public int $categoryId,
        public int $createdBy,
    ) {}

    public static function fromCreateEventDTO(CreateEventDTO $dto, ?string $coverHash): self
    {
        return new self(
            visibility: $dto->visibility,
            stage: $dto->stage,
            cover: $coverHash,
            title: $dto->title,
            description: $dto->description,
            startTime: $dto->startTime,
            endTime: $dto->endTime,
            categoryId: $dto->categoryId,
            createdBy: $dto->createdBy,
        );
    }

    public function toArray(): array
    {
        return [
            'visibility' => $this->visibility,
            'stage' => $this->stage,
            'cover' => $this->cover,
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'category_id' => $this->categoryId,
            'created_by' => $this->createdBy,
        ];
    }
}
