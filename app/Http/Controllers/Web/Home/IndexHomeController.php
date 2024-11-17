<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Home;

use App\Services\Category\ListTenCategoryService;
use App\Services\Event\ListFivePublishedEventService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final readonly class IndexHomeController
{
    public function __construct(
        private ListTenCategoryService $listTenCategoryService,
        private ListFivePublishedEventService $listFivePublishedEventService,
    ) {}

    public function __invoke(Request $request): Response
    {
        return Inertia::render('Web/Home/IndexHome', [
            'categories' => fn() => $this->listTenCategoryService->list(),
            'events' => fn() => $this->listFivePublishedEventService->list(),
        ]);
    }
}
