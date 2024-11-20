<?php

namespace App\Http\Controllers\App\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class ViewEventController extends Controller
{
    /**
     * @todo Preciso definir se vou utilizar query params ou realmente manter um endpoint separado.
     */
    public function __invoke(Event $event, Request $request): EventResource
    {
        return new EventResource($event);
    }
}
