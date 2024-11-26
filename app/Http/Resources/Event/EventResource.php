<?php

declare(strict_types=1);

namespace App\Http\Resources\Event;

use App\Enums\StageEnum;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\CoverResource;
use App\Http\Resources\DateTimeResource;
use App\Http\Resources\Location\LocationResource;
use App\Http\Resources\StageResource;
use App\Http\Resources\VisibilityResource;
use App\Support\DateTimeRangeForHumanSupport;
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
            'cover' => new CoverResource($this->cover ?? ''),
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            $this->mergeWhen($this->stage->value === StageEnum::PUBLISHED->value, [
                'start_end_time_for_human' => DateTimeRangeForHumanSupport::date($this->start_time, $this->end_time),
            ]),
            'start_time' => new DateTimeResource($this->start_time),
            'end_time' => new DateTimeResource($this->end_time),
            'category' => new CategoryResource($this->category),
            'location' => new LocationResource($this->location),
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
