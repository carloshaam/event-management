<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\TimestampCast;
use Database\Factories\TicketFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $event_id
 * @property string $title
 * @property int $quantity
 * @property int $price
 * @property string $quantity_per_order
 * @property string $start_time
 * @property string $end_time
 */
class Ticket extends Model
{
    /** @use HasFactory<TicketFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'title',
        'quantity',
        'price',
        'quantity_per_order',
        'start_time',
        'end_time',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_time' => TimestampCast::class,
            'end_time' => TimestampCast::class,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationship methods
    |--------------------------------------------------------------------------
    */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
