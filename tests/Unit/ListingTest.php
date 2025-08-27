<?php

namespace Tests\Unit;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_listing_belongs_to_user()
    {
        $user = User::factory()->create();
        $listing = Listing::factory()->for($user)->create();

        $this->assertInstanceOf(User::class, $listing->user);
        $this->assertEquals($user->id, $listing->user->id);
    }

    public function test_scope_filter_by_tag()
    {
        Listing::factory()->create(['tags' => 'php, laravel']);
        Listing::factory()->create(['tags' => 'javascript, vue']);

        $filtered = Listing::filter(['tag' => 'php'])->get();

        $this->assertCount(1, $filtered);
        $this->assertStringContainsString('php', $filtered->first()->tags);
    }

    public function test_scope_filter_by_search()
    {
        Listing::factory()->create(['title' => 'Senior PHP Developer']);
        Listing::factory()->create(['title' => 'Frontend Developer']);
        Listing::factory()->create(['description' => 'Looking for PHP expert']);

        $filtered = Listing::filter(['search' => 'PHP'])->get();

        $this->assertCount(2, $filtered);
        $this->assertTrue($filtered->every(
            fn ($listing) => str_contains(strtolower($listing->title), 'php') ||
                str_contains(strtolower($listing->description), 'php')
        ));
    }

    public function test_scope_filter_combines_tag_and_search()
    {
        Listing::factory()->create(['title' => 'PHP Developer', 'tags' => 'php, backend']);
        Listing::factory()->create(['title' => 'PHP Developer', 'tags' => 'php, frontend']);
        Listing::factory()->create(['title' => 'JavaScript Developer', 'tags' => 'js, frontend']);

        $filtered = Listing::filter(['tag' => 'php', 'search' => 'Developer'])->get();

        $this->assertCount(2, $filtered);
        $this->assertTrue($filtered->every(
            fn ($listing) => str_contains($listing->tags, 'php') &&
                str_contains($listing->title, 'Developer')
        ));
    }

    public function test_scope_filter_ignores_empty_filters()
    {
        Listing::factory()->count(3)->create();

        $filtered = Listing::filter([])->get();
        $all = Listing::all();

        $this->assertEquals($all->count(), $filtered->count());
    }

    public function test_listing_has_correct_fillable_fields()
    {
        $fillable = (new Listing)->getFillable();

        $expected = [
            'user_id',
            'title',
            'company',
            'location',
            'email',
            'website',
            'tags',
            'logo',
            'description',
        ];

        $this->assertEquals($expected, $fillable);
    }

    public function test_listing_has_correct_casts()
    {
        $listing = new Listing;
        $casts = $listing->getCasts();

        $this->assertArrayHasKey('created_at', $casts);
        $this->assertArrayHasKey('updated_at', $casts);
        $this->assertEquals('datetime', $casts['created_at']);
        $this->assertEquals('datetime', $casts['updated_at']);
    }

    public function test_route_key_name_is_id()
    {
        $listing = new Listing;
        $this->assertEquals('id', $listing->getRouteKeyName());
    }
}
