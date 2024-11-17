<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $stage = $this->resource;

        return [
            'value' => $stage->value,
            'label' => $stage->label(),
            'text' => $stage->text(),
            'color' => $stage->color(),
        ];
    }
}
