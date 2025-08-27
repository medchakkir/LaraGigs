<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => 'Listing '.fake()->unique()->numberBetween(1, 100000),
            'tags' => collect(range(1, 3))->map(fn () => fake()->unique()->word())->implode(', '),
            'company' => fake()->company(),
            'email' => fake()->companyEmail(),
            'website' => fake()->url(),
            'location' => fake()->city().', '.fake()->countryCode(),
            'description' => fake()->paragraph(),
        ];
    }
}
