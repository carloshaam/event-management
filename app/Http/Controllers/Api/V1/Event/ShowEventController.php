<?php

namespace App\Http\Controllers\Api\V1\Event;

use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

final readonly class ShowEventController
{
    /**
     * @todo Preciso definir se vou utilizar query params ou realmente manter um endpoint separado.
     */
    public function __invoke(Event $event, Request $request): EventResource
    {
        return new EventResource($event);
    }
}
