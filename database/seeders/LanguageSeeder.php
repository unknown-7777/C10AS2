<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
                    ['name' => 'English', 'code' => 'en'],
                    ['name' => 'Russian', 'code' => 'ru'],
                    ['name' => 'Turkmen', 'code' => 'tk'],
                    ['name' => 'Turkish', 'code' => 'tr'],
                    ['name' => 'German', 'code' => 'de'],
                    ['name' => 'French', 'code' => 'fr'],
                ];
        
                foreach ($languages as $language) {
                    Language::firstOrCreate(['name' => $language['name']], ['code' => $language['code']]);
                }
    }
}
