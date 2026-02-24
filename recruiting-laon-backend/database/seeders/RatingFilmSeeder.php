<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RatingFilmSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ratings_films')->insert([

            // Film ID 1 - Bela Vingança
            [
                'film_id' => 1,
                'source' => 'IMDb',
                'rating' => 7.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 1,
                'source' => 'Rotten Tomatoes',
                'rating' => 8.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 2 - Her
            [
                'film_id' => 2,
                'source' => 'IMDb',
                'rating' => 8.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 2,
                'source' => 'Metacritic',
                'rating' => 9.1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 3 - Um Lugar Silencioso
            [
                'film_id' => 3,
                'source' => 'IMDb',
                'rating' => 7.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 3,
                'source' => 'Rotten Tomatoes',
                'rating' => 9.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 4 - Star Wars
            [
                'film_id' => 4,
                'source' => 'IMDb',
                'rating' => 8.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 4,
                'source' => 'Rotten Tomatoes',
                'rating' => 9.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 5 - Jojo Rabbit
            [
                'film_id' => 5,
                'source' => 'IMDb',
                'rating' => 7.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 5,
                'source' => 'Metacritic',
                'rating' => 8.4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 6 - Viúva Negra
            [
                'film_id' => 6,
                'source' => 'IMDb',
                'rating' => 6.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 6,
                'source' => 'Rotten Tomatoes',
                'rating' => 7.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
