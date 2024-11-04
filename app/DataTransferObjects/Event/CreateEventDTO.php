<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Event;

use App\Enums\VisibilityEnum;
use Illuminate\Foundation\Http\FormRequest;

readonly class CreateEventDTO
{
    public function __construct(
        public VisibilityEnum $visibility,
        public string $title,
        public string $description,
        public string $startTime,
        public string $endTime,
        public int $category_id,
        public int $created_by,
    ) {}

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            visibility: VisibilityEnum::from($request->input('visibility')),
            title: $request->input('title'),
            description: $request->input('description'),
            startTime: $request->input('start_time'),
            endTime: $request->input('end_time'),
            category_id: $request->input('category_id'),
            created_by: $request->user()->id,
        );
    }

    public function toArray(): array
    {
        return [
            'visibility' => $this->visibility,
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'category_id' => $this->category_id,
            'created_by' => $this->created_by,
        ];
    }
}
