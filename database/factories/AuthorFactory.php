<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                    'name'       => fake()->name(),
                    'surname'    => fake()->lastname(),
                    'birth_date' => fake()->date('Y-m-d', '2000-01-01'),
                    'death_date' => fake()->optional()->date(),
                    // 'country'    => fake()->country(),
        ];
    }
}
