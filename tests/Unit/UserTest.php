<?php

namespace Tests\Unit;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_many_listings()
    {
        $user = User::factory()->create();
        $listings = Listing::factory()->count(3)->for($user)->create();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $user->listings);
        $this->assertCount(3, $user->listings);
        $this->assertInstanceOf(Listing::class, $user->listings->first());
    }

    public function test_user_listings_relationship_returns_correct_data()
    {
        $user = User::factory()->create();
        $listing = Listing::factory()->for($user)->create([
            'title' => 'Test Job',
            'company' => 'Test Company',
        ]);

        $userListings = $user->listings;

        $this->assertCount(1, $userListings);
        $this->assertEquals('Test Job', $userListings->first()->title);
        $this->assertEquals('Test Company', $userListings->first()->company);
        $this->assertEquals($user->id, $userListings->first()->user_id);
    }

    public function test_user_has_correct_fillable_fields()
    {
        $fillable = (new User)->getFillable();

        $expected = ['name', 'email', 'password'];

        $this->assertEquals($expected, $fillable);
    }

    public function test_user_has_correct_hidden_fields()
    {
        $hidden = (new User)->getHidden();

        $this->assertContains('password', $hidden);
        $this->assertContains('remember_token', $hidden);
    }

    public function test_user_has_correct_casts()
    {
        $user = new User;
        $casts = $user->getCasts();

        $this->assertArrayHasKey('email_verified_at', $casts);
        $this->assertArrayHasKey('password', $casts);
        $this->assertEquals('datetime', $casts['email_verified_at']);
        $this->assertEquals('hashed', $casts['password']);
    }

    public function test_user_password_is_hashed_when_created()
    {
        $user = User::factory()->create([
            'password' => 'plaintext123',
        ]);

        $this->assertNotEquals('plaintext123', $user->password);
        $this->assertTrue(password_verify('plaintext123', $user->password));
    }
}
