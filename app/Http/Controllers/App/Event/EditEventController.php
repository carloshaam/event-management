<?php

namespace App\Http\Controllers\App\Event;

use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final readonly class EditEventController
{
    public function __invoke(Event $event, Request $request): Response
    {
        return Inertia::render('App/Event/EditEvent', [
            'event' => new EventResource($event),
        ]);
    }
}
