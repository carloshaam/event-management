<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Event;

readonly class CreateEventDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public string $start_time,
        public string $end_time,
        public int $category_id,
        public int $created_by,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'category_id' => $this->category_id,
            'created_by' => $this->created_by,
        ];
    }
}
