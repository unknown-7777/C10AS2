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
        $birthDate = fake()->dateTimeBetween('-80 years', '-20 years');
        
        return [
            'name'       => fake()->firstName(),
            'surname'    => fake()->lastName(),
            'bio'        => fake()->paragraph(3),
            'country'    => fake()->country(),
            'birth_date' => $birthDate->format('Y-m-d'),
            'death_date' => fake()->optional(0.3)->dateTimeBetween($birthDate, 'now')?->format('Y-m-d'), 
        ];
    }
}
