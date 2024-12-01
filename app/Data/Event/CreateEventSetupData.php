<?php

declare(strict_types=1);

namespace App\Data\Event;

use App\Data\Location\CreateLocationData;
use App\Data\Ticket\CreateTicketCollectionData;
use App\Enums\StageEnum;
use App\Enums\VisibilityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

final class CreateEventSetupData
{
    public function __construct(
        public VisibilityEnum $visibility,
        public StageEnum $stage,
        public ?UploadedFile $cover,
        public string $title,
        public string $description,
        public string $startTime,
        public string $endTime,
        public int $categoryId,
        public int $createdBy,
        public CreateLocationData $location,
        public CreateTicketCollectionData $tickets,
    ) {}

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            visibility: VisibilityEnum::from($request->input('visibility')),
            stage: StageEnum::from($request->input('stage')),
            cover: $request->hasFile('cover') ? $request->file('cover') : null,
            title: $request->input('title'),
            description: $request->input('description'),
            startTime: $request->input('start_time'),
            endTime: $request->input('end_time'),
            categoryId: $request->input('category_id'),
            createdBy: $request->user()->id,
            location: CreateLocationData::fromRequest($request),
            tickets: CreateTicketCollectionData::fromArray($request->input('tickets', []))
        );
    }

    public function toArray(): array
    {
        return [
            'visibility' => $this->visibility,
            'stage' => $this->stage,
            'cover' => $this->cover,
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'category_id' => $this->categoryId,
            'created_by' => $this->createdBy,
            'location' => $this->location->toArray(),
            'tickets' =>  $this->tickets->toArray(),
        ];
    }
}
