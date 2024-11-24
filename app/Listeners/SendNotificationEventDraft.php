<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\EventRegistered;
use App\Notifications\EventDraftRegistrationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

final class SendNotificationEventDraft implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public int $delay = 60;

    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(EventRegistered $event): void
    {
        $event->event->user->notify(new EventDraftRegistrationNotification($event->event));
    }

    /**
     * Determine whether the listener should be queued.
     */
    public function shouldQueue(EventRegistered $event): bool
    {
        return $event->event->isDraft();
    }

    /**
     * Handle a job failure.
     */
    public function failed(EventRegistered $event, Throwable $exception): void
    {
        Log::error(
            'Failed to send notification after event registration', [
                'event_id' => $event->event->id,
                'error' => $exception->getMessage()
            ]
        );
    }
}
