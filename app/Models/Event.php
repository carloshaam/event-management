<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\VisibilityEnum;
use App\Observers\EventObserver;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property VisibilityEnum $visibility
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property string $category_id
 * @property string $created_by
 */
#[ObservedBy([EventObserver::class])]
class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'visibility',
        'title',
        'slug',
        'description',
        'start_time',
        'end_time',
        'category_id',
        'created_by',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'visibility' => VisibilityEnum::class,
            'start_time' => 'datetime',
            'end_time' => 'datetime',
        ];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationship methods
    |--------------------------------------------------------------------------
    */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class);
    }
}
