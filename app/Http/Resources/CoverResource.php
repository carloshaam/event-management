<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CoverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $cover = $this->resource;

        if (empty($cover)) {
            return [
                'value' => 'cover-default.png',
                'path' => asset('images/cover-default.png'),
                'download_url' => asset('images/cover-default.png'),
            ];
        }

        return [
            'value' => $cover,
            'path' => Storage::url('events/' . $cover),
            'download_url' => asset(Storage::url('events/' . $cover)),
        ];
    }
}
