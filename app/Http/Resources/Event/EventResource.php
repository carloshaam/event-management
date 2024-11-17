<?php

declare(strict_types=1);

namespace App\Http\Resources\Event;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Location\LocationResource;
use App\Http\Resources\StageResource;
use App\Http\Resources\VisibilityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'visibility' => new VisibilityResource($this->visibility),
            'stage' => new StageResource($this->stage),
            'cover' => $this->cover,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'start_time' => $this->start_time->format('Y-m-d'),
            'end_time' => $this->end_time->format('Y-m-d'),
            'category' => new CategoryResource($this->category),
            'location' => new LocationResource($this->location),
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
