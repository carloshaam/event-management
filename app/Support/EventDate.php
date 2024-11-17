<?php

declare(strict_types=1);

namespace App\Support;

readonly class EventDate
{
    public static function date($date): array
    {
        return [
            'original' => $date->toIso8601String(),
            'formatted' => $date->translatedFormat('d M Y, H:i T'),
            'timezone' => $date->timezoneName,
            'unix_timestamp' => $date->timestamp,
            'iso_8601' => $date->toIso8601String(),
            'relative' => $date->diffForHumans(),
            'day_of_week' => $date->translatedFormat('l'),
        ];
    }
}
