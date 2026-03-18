<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerieUserSeeder extends Seeder
{
    public function run(): void

    {
        DB::table('serie_user')->insert([

            ['serie_id' => 2, 'user_id' => 1],
            ['serie_id' => 1, 'user_id' => 1],
            ['serie_id' => 9, 'user_id' => 1]

        ]);
    }
}
