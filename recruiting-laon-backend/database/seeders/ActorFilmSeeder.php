<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorFilmSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actor_film')->insert([

            ['film_id' => 1, 'actor_id' => 1], // Bela Vingança
            ['film_id' => 1, 'actor_id' => 5],
            ['film_id' => 1, 'actor_id' => 3],

            ['film_id' => 2, 'actor_id' => 2], // Her
            ['film_id' => 2, 'actor_id' => 1],
            ['film_id' => 2, 'actor_id' => 5],

            ['film_id' => 3, 'actor_id' => 4], // Um Lugar Silencioso
            ['film_id' => 3, 'actor_id' => 2],
            ['film_id' => 3, 'actor_id' => 5],

            ['film_id' => 4, 'actor_id' => 5], // Star Wars
            ['film_id' => 4, 'actor_id' => 3],
            ['film_id' => 4, 'actor_id' => 1],

            ['film_id' => 5, 'actor_id' => 6], // Jojo Rabbit
            ['film_id' => 5, 'actor_id' => 2],
            ['film_id' => 5, 'actor_id' => 5],

            ['film_id' => 6, 'actor_id' => 3], // Viúva Negra
            ['film_id' => 6, 'actor_id' => 1],
            ['film_id' => 6, 'actor_id' => 2],
        ]);
    }
}
