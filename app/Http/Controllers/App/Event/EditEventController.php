<?php

namespace App\Http\Controllers\App\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EditEventController extends Controller
{
    public function __invoke(Event $event, Request $request)
    {
        return Inertia::render('App/Event/EditEvent', [
            'teste' => true
        ]);
    }
}
