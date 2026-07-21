<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title'        => fake()->sentence(fake()->numberBetween(2, 5), false),
                'code'         => fake()->unique()->isbn13(),
                'page_count'   => fake()->numberBetween(80, 1200),
                'description'  => fake()->paragraph(3),
                'author_id'    => Author::inRandomOrder()->first()?->id ?? Author::factory(),
                'category_id'  => Category::inRandomOrder()->first()?->id ?? Category::factory(),
                'year_id'      => Year::inRandomOrder()->first()?->id ?? Year::factory(),
                'language_id'  => Language::inRandomOrder()->first()?->id ?? Language::factory(),
                'publisher_id' => Publisher::inRandomOrder()->first()?->id ?? Publisher::factory(),
        ];
    }
}
