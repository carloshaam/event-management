<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Support\Facades\Storage;

readonly class EventCover
{
    public static function cover(?string $cover): array
    {
        if (empty($cover)) {
            return [
                'value' => 'cover-default.png',
                'path' => asset('images/cover-default.png'),
                'download' => asset('images/cover-default.png'),
            ];
        }

        return [
            'value' => $cover,
            'path' => Storage::url("events/$cover"),
            'download' => asset(Storage::url("events/$cover")),
        ];
    }
}
