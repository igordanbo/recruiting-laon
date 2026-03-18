<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySerieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category_serie')->insert([

            ['serie_id' => 1, 'category_id' => 1],
            ['serie_id' => 1, 'category_id' => 2],

            ['serie_id' => 2, 'category_id' => 1],
            ['serie_id' => 2, 'category_id' => 2],

            ['serie_id' => 3, 'category_id' => 3],
            ['serie_id' => 3, 'category_id' => 2],

            ['serie_id' => 4, 'category_id' => 2],
            ['serie_id' => 4, 'category_id' => 6],

            ['serie_id' => 5, 'category_id' => 5],
            ['serie_id' => 5, 'category_id' => 1],

            ['serie_id' => 6, 'category_id' => 4],
            ['serie_id' => 6, 'category_id' => 6],

            ['serie_id' => 7, 'category_id' => 7],
            ['serie_id' => 7, 'category_id' => 1],

            ['serie_id' => 8, 'category_id' => 7],
            ['serie_id' => 8, 'category_id' => 6],

            ['serie_id' => 9, 'category_id' => 7],
            ['serie_id' => 9, 'category_id' => 6],

            ['serie_id' => 10, 'category_id' => 7],
            ['serie_id' => 10, 'category_id' => 6],

            ['serie_id' => 11, 'category_id' => 7],
            ['serie_id' => 11, 'category_id' => 6],

            ['serie_id' => 12, 'category_id' => 7],
            ['serie_id' => 12, 'category_id' => 6],


        ]);
    }
}
