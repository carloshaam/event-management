<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisibilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $visibility = $this->resource;

        return [
            'value' => $visibility->value,
            'label' => $visibility->label(),
            'text' => $visibility->text(),
            'color' => $visibility->color(),
        ];
    }
}
