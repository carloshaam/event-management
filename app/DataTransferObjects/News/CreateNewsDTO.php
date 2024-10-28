<?php

declare(strict_types=1);

namespace App\DataTransferObjects\News;

readonly class CreateNewsDTO
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
        public string $content,
    ) {}

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
            'content' => $this->content,
        ];
    }
}
