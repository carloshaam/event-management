<?php

declare(strict_types=1);

namespace App\Data\News;

final class CreateNewsCollectionData
{
    public function __construct(public array $news) {}

    public static function fromArray(array $news): self
    {
        return new self(
            array_map(fn($new) => CreateNewsData::fromArray($new), $news)
        );
    }

    public function toArray(): array
    {
        return array_map(fn(CreateNewsData $new) => $new->toArray(), $this->news);
    }

    public function getNews(): array
    {
        return $this->news;
    }
}
