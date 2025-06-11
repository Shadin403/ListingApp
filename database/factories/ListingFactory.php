<?php

namespace Database\Factories;

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
            'user_id' => fake()->randomElement([1, 2]),
            'title' => fake()->sentence(10),
            'desc' => fake()->paragraph(20),
            'email' => fake()->email(),
            'link' => fake()->url(),
            'tags' => fake()->words(3),
            'approved' => 1,
        ];
    }
}
