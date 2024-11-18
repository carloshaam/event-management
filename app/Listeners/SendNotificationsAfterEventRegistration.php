<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\EventRegistered;
use App\Notifications\EventDraftRegistrationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationsAfterEventRegistration implements ShouldQueue
{
    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 60;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventRegistered $event): void
    {
        $event->event->user->notify(new EventDraftRegistrationNotification($event->event));
    }
}
