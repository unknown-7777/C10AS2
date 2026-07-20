<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                        'Fiction', 'Non-Fiction', 'Science', 'History', 'Biography',
                        'Fantasy', 'Mystery', 'Romance', 'Horror', 'Self-Help',
                        'Technology', 'Philosophy', 'Poetry', 'Drama', 'Thriller',
                    ]),
        ];
    }
}
