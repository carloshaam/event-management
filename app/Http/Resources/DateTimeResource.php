<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DateTimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $date = $this->resource;

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
