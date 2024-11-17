<?php

namespace App\Http\Controllers\App\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EditEventController extends Controller
{
    public function __invoke(Event $event, Request $request): Response
    {
        return Inertia::render('App/Event/EditEvent', [
            'teste' => true
        ]);
    }
}
