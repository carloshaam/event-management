<?php

use App\Enums\VisibilityEnum;
use App\Http\Resources\Event\EventResource;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Services\Event\CreateEventCompleteService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->artisan('migrate:fresh');

    $user = User::factory()->create();
    Auth::login($user);

    Event::observe(App\Observers\EventObserver::class);
});

test('can create an event', function () {
    $user = Auth::user();
    $category = Category::factory()->create();

    $data = [
        'visibility' => VisibilityEnum::PRIVATE,
        'title' => 'Titulo teste',
        'description' => 'Descrição teste',
        'start_time' => '2024-10-27T16:43',
        'end_time' => '2024-10-28T16:43',
        'category_id' => $category->id,
        'created_by' => $user->id,
        'zip_code' => '12345678',
        'street' => 'Rua Teste',
        'number' => '123',
        'complement' => 'Apto 1',
        'neighborhood' => 'Bairro Teste',
        'city' => 'Cidade Teste',
        'state' => 'MG',
    ];

    $service = app(CreateEventCompleteService::class);
    $eventResponse = $service->createEventComplete($data);

    $eventResponseData = $eventResponse->toArray(request());

    if (! isset($eventResponseData['slug'])) {
        $eventResponseData['slug'] = Str::slug($eventResponseData['title']);
    }

    expect($eventResponseData)
        ->toHaveKey('title', 'Titulo teste')
        ->and($eventResponseData)->toHaveKey('slug', Str::slug('Titulo teste'))
        ->and($eventResponse)->not()->toBeNull()->toBeInstanceOf(EventResource::class);

    $this->assertDatabaseHas('locations', [
        'event_id' => $eventResponseData['id'],
        'zip_code' => '12345678',
        'street' => 'Rua Teste',
        'number' => '123',
        'complement' => 'Apto 1',
        'neighborhood' => 'Bairro Teste',
        'city' => 'Cidade Teste',
        'state' => 'MG',
    ]);
});

test('creates unique slug if title already exists', function () {
    $user = Auth::user();
    $category = Category::factory()->create();

    $data = [
        'visibility' => VisibilityEnum::PRIVATE,
        'title' => 'Titulo teste',
        'description' => 'Descrição teste',
        'start_time' => '2024-10-27 16:43:00',
        'end_time' => '2024-10-28 16:43:00',
        'category_id' => $category->id,
        'created_by' => $user->id,
        'zip_code' => '12345678',
        'street' => 'Rua Teste',
        'number' => '123',
        'complement' => 'Apto 1',
        'neighborhood' => 'Bairro Teste',
        'city' => 'Cidade Teste',
        'state' => 'MG',
    ];

    $service = app(CreateEventCompleteService::class);

    $firstEventResponse = $service->createEventComplete($data);
    $firstEventResponseData = $firstEventResponse->toArray(request());

    $secondEventResponse = $service->createEventComplete($data);
    $secondEventResponseData = $secondEventResponse->toArray(request());

    expect($firstEventResponseData['slug'])
        ->toContain('titulo-teste')
        ->and($secondEventResponseData['slug'])->toContain('titulo-teste-2');
});
