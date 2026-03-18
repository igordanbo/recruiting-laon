<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryFilmSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category_film')->insert([

            ['film_id' => 1, 'category_id' => 1],
            ['film_id' => 1, 'category_id' => 2],

            ['film_id' => 2, 'category_id' => 1],
            ['film_id' => 2, 'category_id' => 2],

            ['film_id' => 3, 'category_id' => 3],
            ['film_id' => 3, 'category_id' => 2],

            ['film_id' => 4, 'category_id' => 2],
            ['film_id' => 4, 'category_id' => 6],

            ['film_id' => 5, 'category_id' => 5],
            ['film_id' => 5, 'category_id' => 1],

            ['film_id' => 6, 'category_id' => 4],
            ['film_id' => 6, 'category_id' => 6],

            ['film_id' => 7, 'category_id' => 7],
            ['film_id' => 7, 'category_id' => 1],

            ['film_id' => 8, 'category_id' => 7],
            ['film_id' => 8, 'category_id' => 6],

            ['film_id' => 9, 'category_id' => 7],
            ['film_id' => 9, 'category_id' => 6],

            ['film_id' => 10, 'category_id' => 7],
            ['film_id' => 10, 'category_id' => 6],

            ['film_id' => 11, 'category_id' => 7],
            ['film_id' => 11, 'category_id' => 6],

            ['film_id' => 12, 'category_id' => 7],
            ['film_id' => 12, 'category_id' => 6],

            ['film_id' => 13, 'category_id' => 7],
            ['film_id' => 13, 'category_id' => 6],

            ['film_id' => 14, 'category_id' => 7],
            ['film_id' => 14, 'category_id' => 6],

        ]);
    }
}
