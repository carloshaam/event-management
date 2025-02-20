<?php

declare(strict_types=1);

namespace App\Observers;

use App\Events\EventRegistered;
use App\Models\Event;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

final readonly class EventObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        event(new EventRegistered($event));
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }
}
