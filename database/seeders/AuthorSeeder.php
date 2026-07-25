<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory(100)->create();

    // $authors = [
    //             ['name' => 'Aman', 'surname' => 'Myradow', 'country' => 'Turkmenistan'],
    //             ['name' => 'Azat', 'surname' => 'Donemzow', 'country' => 'Turkmenistan'],
    //             ['name' => 'Aly', 'surname' => 'Sohradow', 'country' => 'Turkmenistan'],
    //             ['name' => 'Myrat', 'surname' => 'Amanow', 'country' => 'Turkmenistan'],
    //             ['name' => 'Magtymguly', 'surname' => 'Pyragy', 'country' => 'Turkmenistan'],
    //         ];
    
    //         foreach ($authors as $author) {
    //             Author::create($author);
    //         }

    }

}
