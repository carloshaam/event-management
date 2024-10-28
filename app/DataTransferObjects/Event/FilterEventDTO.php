<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Event;

readonly class FilterEventDTO
{
    public function __construct(
        public ?string $title,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
