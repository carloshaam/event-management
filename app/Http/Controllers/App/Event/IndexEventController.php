<?php

declare(strict_types=1);

namespace App\Http\Controllers\App\Event;

use App\Services\Category\ListCategoryService;
use App\Services\Event\ListEventIndividualService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final readonly class IndexEventController
{
    public function __construct(
        private ListEventIndividualService $listEventIndividualService,
        private ListCategoryService $listCategoryService
    ) {}

    public function __invoke(Request $request): Response
    {
        return Inertia::render('App/Event/IndexEvent', [
            'events' => fn () => $this->listEventIndividualService->listEventsIndividual($request->user()->id, $request->all()),
            'categories' => fn () => $this->listCategoryService->listCategories(),
        ]);
    }
}
