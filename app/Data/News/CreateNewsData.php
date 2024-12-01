<?php

declare(strict_types=1);

namespace App\Data\News;

use Illuminate\Foundation\Http\FormRequest;

final class CreateNewsData
{
    public function __construct(
        public string $source,
        public string $title,
        public string $url,
        public string $urlToImage,
        public string $publishedAt,
    ) {}

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            source: $request->input('source'),
            title: $request->input('title'),
            url: $request->input('url'),
            urlToImage: $request->input('url_to_image'),
            publishedAt: $request->input('published_at'),
        );
    }

    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            title: $data['title'],
            url: $data['url'],
            urlToImage: $data['url_to_image'],
            publishedAt: $data['published_at'],
        );
    }

    public function toArray(): array
    {
        return [
            'source' => $this->source,
            'title' => $this->title,
            'url' => $this->url,
            'url_to_image' => $this->urlToImage,
            'published_at' => $this->publishedAt,
        ];
    }
}
