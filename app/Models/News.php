<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $source_slug
 * @property string $source_name
 * @property string $author
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $url_to_image
 * @property string $published_at
 * @property string $content
 */
class News extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'source_slug',
        'source_name',
        'author',
        'title',
        'description',
        'url',
        'url_to_image',
        'published_at',
        'content',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
