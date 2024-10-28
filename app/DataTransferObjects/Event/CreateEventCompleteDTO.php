<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Event;

use App\DataTransferObjects\Location\CreateLocationDTO;

readonly class CreateEventCompleteDTO // TODO: remover
{
    public function __construct(
        public string $title,
        public string $description,
        public string $start_time,
        public string $end_time,
        public int $category_id,
        public CreateLocationDTO $createLocationDTO,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'category_id' => $this->category_id,
            'location' => $this->createLocationDTO->toArray(),
        ];
    }
}
