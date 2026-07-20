<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Language>
 */
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $languages = [
                    ['name' => 'English', 'code' => 'en'],
                    ['name' => 'Russian', 'code' => 'ru'],
                    ['name' => 'Turkmen', 'code' => 'tk'],
                    ['name' => 'Turkish', 'code' => 'tr'],
                    ['name' => 'German', 'code' => 'de'],
                    ['name' => 'French', 'code' => 'fr'],
                ];
        
                return fake()->randomElement($languages);

    }
}
