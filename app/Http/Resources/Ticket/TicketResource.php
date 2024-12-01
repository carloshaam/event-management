<?php

declare(strict_types=1);

namespace App\Http\Resources\Ticket;

use App\Http\Resources\DateTimeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'event_id' => $this->event_id,
            'title' => $this->title,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'quantity_per_order' => $this->quantity_per_order,
            'start_time' => new DateTimeResource($this->start_time),
            'end_time' => new DateTimeResource($this->end_time),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
