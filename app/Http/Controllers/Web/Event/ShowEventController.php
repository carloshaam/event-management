<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Event;

use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final readonly class ShowEventController
{
    public function __invoke(Event $event, Request $request): Response
    {
        return Inertia::render('Web/Event/ShowEvent', [
            'event' => new EventResource($event), // TODO: arrumar esses dados
        ]);
    }
}
