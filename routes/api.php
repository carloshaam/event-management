<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\{
    Event\ShowEventController
};
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'api.v1.', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/events/{event}', ShowEventController::class)
         ->can('update', 'event')
         ->name('events.view');
});
