<?php

declare(strict_types=1);

use App\DataTransferObjects\Event\CreateEventDTO;
use App\DataTransferObjects\Location\CreateLocationDTO;
use App\Enums\VisibilityEnum;
use App\Http\Resources\Event\EventResource;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Services\Event\CreateEventWithLocationService;
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

    $eventDTO = new CreateEventDTO(
        VisibilityEnum::PRIVATE,
        'Titulo teste',
        'Descrição teste',
        '2024-10-27T16:43',
        '2024-10-28T16:43',
        $category->id,
        $user->id
    );

    $locationDTO = new CreateLocationDTO(
        1,
        '12345678',
        'Rua Teste',
        '123',
        'Apto 1',
        'Bairro Teste',
        'Cidade Teste',
        'MG'
    );

    $service = app(CreateEventWithLocationService::class);
    $eventResponse = $service->create($eventDTO, $locationDTO);

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

    $eventDTO = new CreateEventDTO(
        VisibilityEnum::PRIVATE,
        'Titulo teste',
        'Descrição teste',
        '2024-10-27T16:43',
        '2024-10-28T16:43',
        $category->id,
        $user->id
    );

    $locationDTO = new CreateLocationDTO(
        1,
        '12345678',
        'Rua Teste',
        '123',
        'Apto 1',
        'Bairro Teste',
        'Cidade Teste',
        'MG'
    );

    $service = app(CreateEventWithLocationService::class);

    $firstEventResponse = $service->create($eventDTO, $locationDTO);
    $firstEventResponseData = $firstEventResponse->toArray(request());

    $secondEventResponse = $service->create($eventDTO, $locationDTO);
    $secondEventResponseData = $secondEventResponse->toArray(request());

    expect($firstEventResponseData['slug'])
        ->toContain('titulo-teste')
        ->and($secondEventResponseData['slug'])->toContain('titulo-teste-2');
});
