<?php

use App\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {
    Listing::factory()->count(2)->create();

    $response = $this->get('/');

    $response->assertStatus(200);
});
