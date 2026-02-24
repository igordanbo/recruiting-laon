<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryFilmSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category_film')->insert([

            // Bela Vingança
            ['film_id' => 1, 'category_id' => 1],
            ['film_id' => 1, 'category_id' => 2],

            // Her
            ['film_id' => 2, 'category_id' => 1],
            ['film_id' => 2, 'category_id' => 2],

            // Um Lugar Silencioso
            ['film_id' => 3, 'category_id' => 3],
            ['film_id' => 3, 'category_id' => 2],

            // Star Wars
            ['film_id' => 4, 'category_id' => 2],
            ['film_id' => 4, 'category_id' => 6],

            // Jojo Rabbit
            ['film_id' => 5, 'category_id' => 5],
            ['film_id' => 5, 'category_id' => 1],

            // Viúva Negra
            ['film_id' => 6, 'category_id' => 4],
            ['film_id' => 6, 'category_id' => 6],

            // Rick and Morty
            ['film_id' => 7, 'category_id' => 7],
            ['film_id' => 7, 'category_id' => 1],

            // Lucca
            ['film_id' => 8, 'category_id' => 7],
            ['film_id' => 8, 'category_id' => 6],
        ]);
    }
}
