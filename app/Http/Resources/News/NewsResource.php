<?php

declare(strict_types=1);

namespace App\Http\Resources\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
