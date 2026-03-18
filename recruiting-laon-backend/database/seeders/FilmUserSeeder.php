<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmUserSeeder extends Seeder
{
    public function run(): void

    {
        DB::table('film_user')->insert([

            ['film_id' => 2, 'user_id' => 1],
            ['film_id' => 1, 'user_id' => 1],
            ['film_id' => 9, 'user_id' => 1],

        ]);
    }
}
