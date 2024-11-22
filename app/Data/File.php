<?php

declare(strict_types=1);

namespace App\Data;

final readonly class File
{
    public function __construct(
        private string $name,
        private string $originalName,
        private string $extension,
        private string $mime,
        private string $path,
        private string $hash,
        private ?string $collection,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getMime(): string
    {
        return $this->mime;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'file_name' => $this->getOriginalName(),
            'extension' => $this->getExtension(),
            'mime_type' => $this->getMime(),
            'path' => $this->getPath(),
            'file_hash' => $this->getHash(),
            'collection' => $this->getCollection(),
        ];
    }
}
