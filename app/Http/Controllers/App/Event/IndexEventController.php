<?php

declare(strict_types=1);

namespace App\Http\Controllers\App\Event;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final readonly class IndexEventController
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('App/Event/IndexEvent');
    }
}
