<?php

use App\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('filters by tag', function () {
    Listing::factory()->create(['tags' => 'php, laravel']);
    Listing::factory()->create(['tags' => 'react, vue']);

    $filtered = Listing::query()->filter(['tag' => 'php'])->get();

    expect($filtered)->toHaveCount(1);
});

it('filters by search term across title, description, and tags', function () {
    Listing::factory()->create([
        'title' => 'Senior Backend Engineer',
        'description' => 'Great company',
        'tags' => 'php, laravel',
    ]);
    Listing::factory()->create([
        'title' => 'Frontend',
        'description' => 'Working with React',
        'tags' => 'react',
    ]);

    $byTitle = Listing::query()->filter(['search' => 'Backend'])->get();
    $byTags = Listing::query()->filter(['search' => 'laravel'])->get();

    expect($byTitle)->toHaveCount(1);
    expect($byTags)->toHaveCount(1);
});
