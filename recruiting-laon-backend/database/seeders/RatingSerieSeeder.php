<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RatingSerieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ratings_series')->insert([

            // Film ID 1 - Bela Vingança
            [
                'serie_id' => 1,
                'source' => 'IMDb',
                'rating' => 7.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 1,
                'source' => 'Rotten Tomatoes',
                'rating' => 8.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 2 - Her
            [
                'serie_id' => 2,
                'source' => 'IMDb',
                'rating' => 8.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 2,
                'source' => 'Metacritic',
                'rating' => 9.1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 3 - Um Lugar Silencioso
            [
                'serie_id' => 3,
                'source' => 'IMDb',
                'rating' => 7.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 3,
                'source' => 'Rotten Tomatoes',
                'rating' => 9.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 4 - Star Wars
            [
                'serie_id' => 4,
                'source' => 'IMDb',
                'rating' => 8.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 4,
                'source' => 'Rotten Tomatoes',
                'rating' => 9.3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 5 - Jojo Rabbit
            [
                'serie_id' => 5,
                'source' => 'IMDb',
                'rating' => 7.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 5,
                'source' => 'Metacritic',
                'rating' => 8.4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 6 - Viúva Negra
            [
                'serie_id' => 6,
                'source' => 'IMDb',
                'rating' => 6.7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 6,
                'source' => 'Rotten Tomatoes',
                'rating' => 7.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 7 
            [
                'film_id' => 7,
                'source' => 'IMDb',
                'rating' => 7.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 7,
                'source' => 'Metacritic',
                'rating' => 8.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 8
            [
                'film_id' => 8,
                'source' => 'IMDb',
                'rating' => 8.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 8,
                'source' => 'Rotten Tomatoes',
                'rating' => 9.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 9 
            [
                'film_id' => 9,
                'source' => 'IMDb',
                'rating' => 8.4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 9,
                'source' => 'Metacritic',
                'rating' => 8.9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 10 
            [
                'film_id' => 10,
                'source' => 'IMDb',
                'rating' => 7.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 10,
                'source' => 'Rotten Tomatoes',
                'rating' => 8.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 11
            [
                'film_id' => 11,
                'source' => 'IMDb',
                'rating' => 7.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 11,
                'source' => 'Rotten Tomatoes',
                'rating' => 8.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Film ID 12
            [
                'film_id' => 12,
                'source' => 'IMDb',
                'rating' => 7.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'film_id' => 12,
                'source' => 'Rotten Tomatoes',
                'rating' => 8.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
