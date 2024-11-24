<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\TimestampCast;
use App\Enums\StageEnum;
use App\Enums\VisibilityEnum;
use App\Events\EventRegistered;
use App\Observers\EventObserver;
use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property VisibilityEnum $visibility
 * @property StageEnum $stage
 * @property string $cover
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property int $category_id
 * @property int $created_by
 */
#[ObservedBy([EventObserver::class])]
class Event extends Model
{
    /** @use HasFactory<EventFactory> */
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
        'stage',
        'cover',
        'title',
        'slug',
        'description',
        'start_time',
        'end_time',
        'category_id',
        'created_by',
    ];

    protected $dispatchesEvents = [
        'created' => EventRegistered::class,
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
            'stage' => StageEnum::class,
            'start_time' => TimestampCast::class,
            'end_time' => TimestampCast::class,
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

    public function isDraft(): bool
    {
        return $this->stage === StageEnum::DRAFT;
    }

    public function isPublished(): bool
    {
        return $this->stage === StageEnum::PUBLISHED;
    }

    public function isClosed(): bool
    {
        return $this->stage === StageEnum::CLOSED;
    }

    public function isPrivate(): bool
    {
        return $this->visibility === VisibilityEnum::PRIVATE;
    }

    public function isPublic(): bool
    {
        return $this->visibility === VisibilityEnum::PUBLIC;
    }

    public function isPubliclyAccessible(): bool
    {
        return $this->isPublished() && $this->isPublic();
    }

    public function isPrivateAndNotPublished(): bool
    {
        return $this->isClosed() || $this->isDraft() || $this->isPrivate();
    }

    /*
    |--------------------------------------------------------------------------
    | Local scope
    |--------------------------------------------------------------------------
    */
    public function scopeCreatedBy(Builder $query, int $userId): void
    {
        $query->where(column: 'created_by', operator: '=', value: $userId);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where(column: 'stage', operator: '=', value: StageEnum::PUBLISHED->value);
    }

    public function scopePublic(Builder $query): void
    {
        $query->where(column: 'visibility', operator: '=', value: VisibilityEnum::PUBLIC->value);
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
