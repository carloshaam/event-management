<?php

declare(strict_types=1);

use App\Http\Controllers\Web\{
    Home\IndexHomeController,
    Event\ShowEventController
};
use App\Http\Controllers\App\Event\{
    EditEventController,
    IndexEventController,
    CreateEventController,
    StoreEventController
};
use App\Http\Controllers\App\Profile\{
    DestroyProfileController,
    EditProfileController,
    UpdateProfileController
};
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::group(['as' => 'web.'], function () {
    Route::get('/', IndexHomeController::class)->name('home.index');
    Route::get('/events/{event:slug}', ShowEventController::class)->name('events.show');
});

Route::group(['as' => 'app.', 'prefix' => 'app', 'middleware' => 'auth'], function () {
    Route::group(['as' => 'events.', 'prefix' => 'events'], function () {
        Route::get('/', IndexEventController::class)->name('index');
        Route::get('/create', CreateEventController::class)->middleware('verified')->name('create');
        Route::post('/', StoreEventController::class)->name('store');
        Route::get('/{event}/edit', EditEventController::class)->name('edit');
    });
    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', EditProfileController::class)->name('edit');
        Route::patch('/', UpdateProfileController::class)->name('update');
        Route::delete('/', DestroyProfileController::class)->name('destroy');
    });
});
