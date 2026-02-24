<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySerieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category_serie')->insert([

            // Bela Vingança
            ['serie_id' => 1, 'category_id' => 1],
            ['serie_id' => 1, 'category_id' => 2],

            // Her
            ['serie_id' => 2, 'category_id' => 1],
            ['serie_id' => 2, 'category_id' => 2],

            // Um Lugar Silencioso
            ['serie_id' => 3, 'category_id' => 3],
            ['serie_id' => 3, 'category_id' => 2],

            // Star Wars
            ['serie_id' => 4, 'category_id' => 2],
            ['serie_id' => 4, 'category_id' => 6],

            // Jojo Rabbit
            ['serie_id' => 5, 'category_id' => 5],
            ['serie_id' => 5, 'category_id' => 1],

            // Viúva Negra
            ['serie_id' => 6, 'category_id' => 4],
            ['serie_id' => 6, 'category_id' => 6],

        ]);
    }
}
