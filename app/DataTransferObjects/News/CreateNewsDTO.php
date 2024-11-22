<?php

declare(strict_types=1);

namespace App\DataTransferObjects\News;

use Illuminate\Foundation\Http\FormRequest;

final readonly class CreateNewsDTO
{
    public function __construct(
        public string $source_slug,
        public string $source_name,
        public string $author,
        public string $title,
        public string $description,
        public string $url,
        public string $url_to_image,
        public string $published_at,
    ) {}

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            source_slug: $request->input('source_slug'),
            source_name: $request->input('source_name'),
            author: $request->input('author'),
            title: $request->input('title'),
            description: $request->input('description'),
            url: $request->input('url'),
            url_to_image: $request->input('url_to_image'),
            published_at: $request->input('published_at'),
        );
    }

    public function toArray(): array
    {
        return [
            'source_slug' => $this->source_slug,
            'source_name' => $this->source_name,
            'author' => $this->author,
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'url_to_image' => $this->url_to_image,
            'published_at' => $this->published_at,
        ];
    }
}
