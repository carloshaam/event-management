<?php

declare(strict_types=1);

use App\Enums\StageEnum;
use App\Enums\VisibilityEnum;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

test('event screen can be rendered', function () {
    $user = User::factory()->create();
    Auth::login($user);
    $response = $this->get('/app/events');

    $this->assertAuthenticated();
    $response->assertOk();
});

test('can create an event', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();
    $startTime = Carbon::now()->addDays(2)->format('Y-m-d\TH:i');
    $endTime = Carbon::now()->addDays(3)->format('Y-m-d\TH:i');

    $response = $this->actingAs($user)->post('/app/events', [
        'visibility' => VisibilityEnum::PRIVATE->value,
        'stage' => StageEnum::DRAFT->value,
        'cover' => null,
        'title' => 'Event test',
        'slug' => 'event-test',
        'description' => 'Event description test, tesging mock description',
        'start_time' => $startTime,
        'end_time' => $endTime,
        'category_id' => $category->id,
        'created_by' => $user->id,
        'place_name' => 'Place test',
        'zip_code' => '35052888',
        'street' => 'Street test',
        'number' => '450',
        'complement' => null,
        'neighborhood' => 'Neighborhood test',
        'city' => 'City test',
        'state' => 'MG',
        'tickets' => [
            [
                'title' => 'Ticket 1',
                'quantity' => 10,
                'price' => 20,
                'quantity_per_order' => 5,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ],
        ]
    ]);

    $this->assertAuthenticated();
    $response->assertCreated();
});

test('can create an event cover can be uploaded', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();
    $startTime = Carbon::now()->addDays(2)->format('Y-m-d\TH:i');
    $endTime = Carbon::now()->addDays(3)->format('Y-m-d\TH:i');

    Storage::fake('events');

    $file = UploadedFile::fake()->image('cover.jpg');

    $response = $this->actingAs($user)->post('/app/events', [
        'visibility' => VisibilityEnum::PRIVATE->value,
        'stage' => StageEnum::DRAFT->value,
        'cover' => $file,
        'title' => 'Event test',
        'slug' => 'event-test',
        'description' => 'Event description test, tesging mock description',
        'start_time' => $startTime,
        'end_time' => $endTime,
        'category_id' => $category->id,
        'created_by' => $user->id,
        'place_name' => 'Place test',
        'zip_code' => '35052888',
        'street' => 'Street test',
        'number' => '450',
        'complement' => null,
        'neighborhood' => 'Neighborhood test',
        'city' => 'City test',
        'state' => 'MG',
        'tickets' => [
            [
                'title' => 'Ticket 1',
                'quantity' => 10,
                'price' => 20,
                'quantity_per_order' => 5,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ],
        ]
    ]);

    Storage::disk('events')->assertExists($file->hashName());
    $this->assertAuthenticated();
    $response->assertCreated();
});

test('creates unique slug if title already exists', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $startTime = Carbon::now()->addDays(2)->format('Y-m-d\TH:i');
    $endTime = Carbon::now()->addDays(3)->format('Y-m-d\TH:i');

    $this->actingAs($user)->post('/app/events', [
        'visibility' => VisibilityEnum::PRIVATE->value,
        'stage' => StageEnum::DRAFT->value,
        'cover' => null,
        'title' => 'Event test',
        'slug' => 'event-test',
        'description' => 'Event description test new testing',
        'start_time' => $startTime,
        'end_time' => $endTime,
        'category_id' => $category->id,
        'created_by' => $user->id,
        'place_name' => 'Place test',
        'zip_code' => '35052888',
        'street' => 'Street test',
        'number' => '450',
        'complement' => null,
        'neighborhood' => 'Neighborhood test',
        'city' => 'City test',
        'state' => 'MG',
        'tickets' => [
            [
                'title' => 'Ticket 1',
                'quantity' => 10,
                'price' => 20,
                'quantity_per_order' => 5,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ],
        ]
    ]);

    $response = $this->actingAs($user)->post('/app/events', [
        'visibility' => VisibilityEnum::PRIVATE->value,
        'stage' => StageEnum::DRAFT->value,
        'cover' => null,
        'title' => 'Event test',
        'slug' => 'event-test',
        'description' => 'Another event description test testing',
        'start_time' => $startTime,
        'end_time' => $endTime,
        'category_id' => $category->id,
        'created_by' => $user->id,
        'place_name' => 'Another Place test',
        'zip_code' => '35123456',
        'street' => 'Another Street test',
        'number' => '789',
        'complement' => null,
        'neighborhood' => 'Another Neighborhood test',
        'city' => 'Another City test',
        'state' => 'RJ',
        'tickets' => [
            [
                'title' => 'Ticket 1',
                'quantity' => 10,
                'price' => 20,
                'quantity_per_order' => 5,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ],
        ]
    ]);

    $this->assertAuthenticated();
    $response->assertCreated();

    $firstEvent = Event::where('title', 'Event test')->first();
    $secondEvent = Event::where('title', 'Event test')->orderBy('id', 'desc')->first();

    $this->assertNotEquals($firstEvent->slug, $secondEvent->slug);
});
