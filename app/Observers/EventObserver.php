<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Event;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Auth;

class EventObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        $event->created_by = Auth::id();
        $event->save();
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
