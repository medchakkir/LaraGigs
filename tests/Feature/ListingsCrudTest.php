<?php

use App\Models\Listing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('guest cannot access create listing routes', function () {
    $this->get('/listings/create')->assertRedirect('/login');
    $this->post('/listings', [])->assertRedirect('/login');
});

test('user can create listing', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $this->actingAs($user);

    $data = Listing::factory()->make()->only(['title', 'company', 'location', 'email', 'website', 'tags', 'description']);

    $response = $this->post('/listings', $data);

    $response->assertRedirect('/');
    $this->assertDatabaseHas('listings', [
        'user_id' => $user->id,
        'title' => $data['title'],
        'company' => $data['company'],
    ]);
});

test('user can update own listing and old logo is deleted when replaced', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $listing = Listing::factory()->for($user)->create(['logo' => 'logos/old.png']);

    $this->actingAs($user);

    $response = $this->put("/listings/{$listing->id}", [
        'title' => 'Updated Title',
        'company' => $listing->company,
        'location' => $listing->location,
        'email' => $listing->email,
        'website' => $listing->website,
        'tags' => $listing->tags,
        'description' => $listing->description,
    ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect();
    $this->assertDatabaseHas('listings', [
        'id' => $listing->id,
        'title' => 'Updated Title',
    ]);
});

test('user cannot edit others listing', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();

    $listing = Listing::factory()->for($owner)->create();

    $this->actingAs($other);
    $this->get("/listings/{$listing->id}/edit")->assertForbidden();
    $this->put("/listings/{$listing->id}", [])->assertForbidden();
});

test('user can delete own listing and logo removed', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $listing = Listing::factory()->for($user)->create(['logo' => 'logos/old.png']);

    $this->actingAs($user);

    $this->delete("/listings/{$listing->id}")->assertRedirect('/');

    $this->assertDatabaseMissing('listings', ['id' => $listing->id]);
});

test('manage page shows only user listings', function () {
    $user = User::factory()->create();
    $other = User::factory()->create();

    $mine = Listing::factory()->for($user)->create(['title' => 'Mine']);
    $theirs = Listing::factory()->for($other)->create(['title' => 'Theirs']);

    $this->actingAs($user);

    $res = $this->get('/listings/manage');
    $res->assertOk();
    $res->assertSee('Mine');
    $res->assertDontSee('Theirs');
});
