<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {

        $this->call([
            CategorySeeder::class,
            AuthorSeeder::class,
            YearSeeder::class,
            LanguageSeeder::class,
            PublisherSeeder::class,
            BookSeeder::class,
        ]);

        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $pub1 = Publisher::create(['name' => 'Turkmen State Publishing Service']);
        $pub2 = Publisher::create(['name' => 'Ylym Publishing House']);
        $pub3 = Publisher::create(['name' => 'Ruh Publishing']);

        $cat1 = Category::create(['name' => 'Poetry & Unity']);
        $cat2 = Category::create(['name' => 'Historical Fiction']);
        $cat3 = Category::create(['name' => 'Satire & Folklore']);

        $lang1 = Language::create(['name' => 'Turkmen', 'code' => 'tk']);
        $lang2 = Language::create(['name' => 'English', 'code' => 'en']);
        $lang3 = Language::create(['name' => 'Russian', 'code' => 'ru']);


        $ear1 = Year::create(['value' => 1780]);
        $ear2 = Year::create(['value' => 1850]);
        $ear3 = Year::create(['value' => 1940]);
        $ear4 = Year::create(['value' => 1950]);


        $author1 = Author::create([
            'name' => 'Magtymguly',
            'surname' => 'Pyragy',
            'country' => 'Turkmenistan',
            'birth_date' => '1724-05-18',
            'photo_url' => 'authors/Magtymguly.jpg'
        ]);

        $author2 = Author::create([
            'name' => 'Berdi',
            'surname' => 'Kerbabayew',
            'country' => 'Turkmenistan',
            'birth_date' => '1894-03-15',
        ]);

        $author3 = Author::create([
            'name' => 'Mammetweli',
            'surname' => 'Kemine',
            'country' => 'Turkmenistan',
            'birth_date' => '1770-01-01',
        ]);

        $author4 = Author::create([
            'name' => 'Mollanepes',
            'surname' => 'Kadirmammedov',
            'country' => 'Turkmenistan',
            'birth_date' => '1810-06-12',
        ]);

        $author5 = Author::create([
            'name' => 'Ata',
            'surname' => 'Gowudov',
            'country' => 'Turkmenistan',
            'birth_date' => '1904-07-15',
        ]);



        Book::create([
                    'title' => 'The Decree (Perman)',
                    'code' => 'BOOK123`',
                    'author_id' => $author5->id,
                    'publisher_id' => $pub2->id,
                    'category_id' => $cat2->id,
                    'language_id' => $lang1->id,
                    'year_id' => $ear4->id,
                    'page_count' => 360,
                    'description' => 'A major historical novel portraying key events in Turkmen history and struggle.',
        ]);


        Book::create([
            'title' => 'Separated (Aýryldym)',
            'code' => 'BOOK002',
            'author_id' => $author1->id,
            'publisher_id' => $pub2->id,
            'category_id' => $cat1->id,
            'language_id' => $lang1->id,
            'year_id' => $ear1->id,
            'page_count' => 256,
            'cover_image' => 'books/65a2391750c30037243703.jpg',
            'description' => 'A deeply emotional poem reflecting on longing, spiritual journey, and separation.',
        ]);


        Book::create([
            'title' => 'The Decisive Step (Agyr Ädim)',
            'code' => 'BOOK003',
            'author_id' => $author2->id,
            'publisher_id' => $pub1->id,
            'category_id' => $cat2->id,
            'language_id' => $lang1->id,
            'year_id' => $ear3->id,
            'page_count' => 480,
            'description' => 'A landmark novel portraying Turkmen social changes during the early 20th century.',
        ]);


        Book::create([
            'title' => 'The Tales of Kemine (Keminäniň Şorta Sözleri)',
            'code' => 'BOOK004',
            'author_id' => $author3->id,
            'publisher_id' => $pub3->id,
            'category_id' => $cat3->id,
            'language_id' => $lang1->id,
            'year_id' => $ear2->id,
            'page_count' => 210,
            'description' => 'A collection of witty, satirical tales and poems criticizing inequality through folk humor.',
        ]);


        Book::create([
            'title' => 'Zohre And Tahyr (Zöhre - Tahyr )',
            'code' => 'BOOK005',
            'author_id' => $author4->id,
            'publisher_id' => $pub2->id,
            'category_id' => $cat1->id,
            'language_id' => $lang1->id,
            'year_id' => $ear2->id,
            'page_count' => 340,
            'description' => 'A classic romantic dastan based on traditional folk legends of tragic love.',
        ]);

        $this->command->info('✅ 5 authentic Turkmen literature entries seeded successfully!');
    }
}