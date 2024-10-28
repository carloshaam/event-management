<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Inertia\Response;

final class IndexHomeController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('App/Home/IndexHome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
