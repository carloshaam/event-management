<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Services\Category\ListTenCategoryService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final readonly class IndexHomeController
{
    public function __construct(
        private ListTenCategoryService $listTenCategoryService
    ) {}

    public function __invoke(Request $request): Response
    {
        //dd(Cache::get('newsapi-top-headlines'));
        return Inertia::render('App/Home/IndexHome', [
            'categories' => fn () => $this->listTenCategoryService->list(),
        ]);
    }
}
