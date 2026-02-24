<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSerieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actor_serie')->insert([

            ['serie_id' => 1, 'actor_id' => 1],
            ['serie_id' => 1, 'actor_id' => 5],
            ['serie_id' => 1, 'actor_id' => 3],

            ['serie_id' => 2, 'actor_id' => 2],
            ['serie_id' => 2, 'actor_id' => 1],
            ['serie_id' => 2, 'actor_id' => 5],

            ['serie_id' => 3, 'actor_id' => 4],
            ['serie_id' => 3, 'actor_id' => 2],
            ['serie_id' => 3, 'actor_id' => 5],

            ['serie_id' => 4, 'actor_id' => 5],
            ['serie_id' => 4, 'actor_id' => 3],
            ['serie_id' => 4, 'actor_id' => 1],

            ['serie_id' => 5, 'actor_id' => 6],
            ['serie_id' => 5, 'actor_id' => 2],
            ['serie_id' => 5, 'actor_id' => 5],

            ['serie_id' => 6, 'actor_id' => 3],
            ['serie_id' => 6, 'actor_id' => 1],
            ['serie_id' => 6, 'actor_id' => 2],
        ]);
    }
}
