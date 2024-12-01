<?php

declare(strict_types=1);

namespace App\Data\Event;

final class FilterEventData
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
