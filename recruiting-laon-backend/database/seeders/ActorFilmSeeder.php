<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorFilmSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actor_film')->insert([

            ['film_id' => 1, 'actor_id' => 1],
            ['film_id' => 1, 'actor_id' => 5],
            ['film_id' => 1, 'actor_id' => 3],

            ['film_id' => 2, 'actor_id' => 2],
            ['film_id' => 2, 'actor_id' => 1],
            ['film_id' => 2, 'actor_id' => 5],

            ['film_id' => 3, 'actor_id' => 4],
            ['film_id' => 3, 'actor_id' => 2],
            ['film_id' => 3, 'actor_id' => 5],

            ['film_id' => 4, 'actor_id' => 5],
            ['film_id' => 4, 'actor_id' => 3],
            ['film_id' => 4, 'actor_id' => 1],

            ['film_id' => 5, 'actor_id' => 6],
            ['film_id' => 5, 'actor_id' => 2],
            ['film_id' => 5, 'actor_id' => 5],

            ['film_id' => 6, 'actor_id' => 3],
            ['film_id' => 6, 'actor_id' => 1],
            ['film_id' => 6, 'actor_id' => 2],

            ['film_id' => 7, 'actor_id' => 4],
            ['film_id' => 7, 'actor_id' => 5],
            ['film_id' => 7, 'actor_id' => 6],

            ['film_id' => 8, 'actor_id' => 1],
            ['film_id' => 8, 'actor_id' => 3],
            ['film_id' => 8, 'actor_id' => 4],

            ['film_id' => 9, 'actor_id' => 2],
            ['film_id' => 9, 'actor_id' => 6],
            ['film_id' => 9, 'actor_id' => 5],

            ['film_id' => 10, 'actor_id' => 3],
            ['film_id' => 10, 'actor_id' => 4],
            ['film_id' => 10, 'actor_id' => 1],

            ['film_id' => 11, 'actor_id' => 5],
            ['film_id' => 11, 'actor_id' => 2],
            ['film_id' => 11, 'actor_id' => 6],

            ['film_id' => 12, 'actor_id' => 1],
            ['film_id' => 12, 'actor_id' => 3],
            ['film_id' => 12, 'actor_id' => 4],

            ['film_id' => 13, 'actor_id' => 2],
            ['film_id' => 13, 'actor_id' => 6],
            ['film_id' => 13, 'actor_id' => 5],

            ['film_id' => 14, 'actor_id' => 3],
            ['film_id' => 14, 'actor_id' => 4],
            ['film_id' => 14, 'actor_id' => 1],
        ]);
    }
}
