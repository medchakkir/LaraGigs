<?php

use App\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows listings on the index page', function () {
    Listing::factory()->count(3)->create();

    $response = $this->get('/');

    $response->assertOk();
    $response->assertViewIs('listings.index');
    $response->assertSeeTextInOrder(Listing::latest()->pluck('title')->toArray());
});

it('filters listings by search term', function () {
    Listing::factory()->create(['title' => 'Unique Senior PHP Engineer']);
    Listing::factory()->create(['title' => 'Different Title']);

    $response = $this->get('/?search=Senior');

    $response->assertOk();
    $response->assertSee('Unique Senior PHP Engineer');
    $response->assertDontSee('Different Title');
});

it('filters listings by tag', function () {
    Listing::factory()->create(['title' => 'Tagged One', 'tags' => 'php, backend']);
    Listing::factory()->create(['title' => 'Tagged Two', 'tags' => 'frontend, vue']);

    $response = $this->get('/?tag=php');

    $response->assertOk();
    $response->assertSee('Tagged One');
    $response->assertDontSee('Tagged Two');
});

it('shows a single listing', function () {
    $listing = Listing::factory()->create();

    $response = $this->get('/listings/'.$listing->id);

    $response->assertOk();
    $response->assertViewIs('listings.show');
    $response->assertSee($listing->title);
});

it('paginates listings correctly', function () {
    Listing::factory()->count(6)->create();

    $response = $this->get('/');

    $response->assertOk();
    $response->assertViewIs('listings.index');

    // Should show first 4 listings (default pagination)
    $response->assertSee(Listing::latest()->first()->title);
    $response->assertSee(Listing::latest()->skip(3)->first()->title);

    // Should not show the 5th and 6th listings on first page
    $response->assertDontSee(Listing::latest()->skip(4)->first()->title);
    $response->assertDontSee(Listing::latest()->skip(5)->first()->title);
});

it('shows pagination links when there are more than 4 listings', function () {
    Listing::factory()->count(6)->create();

    $response = $this->get('/');

    $response->assertOk();
    // Check if pagination links are present
    $response->assertSee('Next');
    $response->assertSee('Previous');
});

it('combines search and tag filters with pagination', function () {
    Listing::factory()->create(['title' => 'PHP Developer', 'tags' => 'php, backend']);
    Listing::factory()->create(['title' => 'PHP Engineer', 'tags' => 'php, backend']);
    Listing::factory()->create(['title' => 'JavaScript Developer', 'tags' => 'js, frontend']);
    Listing::factory()->create(['title' => 'Python Developer', 'tags' => 'python, backend']);
    Listing::factory()->create(['title' => 'PHP Designer', 'tags' => 'php, design']);

    $response = $this->get('/?search=Developer&tag=php');

    $response->assertOk();
    $response->assertSee('PHP Developer');
    $response->assertDontSee('JavaScript Developer');
    $response->assertDontSee('Python Developer');
});

it('maintains filter parameters across pagination', function () {
    Listing::factory()->count(8)->create(['tags' => 'php, laravel']);

    $response = $this->get('/?tag=php&page=2');

    $response->assertOk();
    $response->assertSee('tag=php');
    // Check for pagination elements instead of specific page numbers
    $response->assertSee('Previous');
    $response->assertSee('Next');
});
