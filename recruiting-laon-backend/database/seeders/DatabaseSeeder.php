<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FilmSeeder::class,
            CategorySeeder::class,
            ActorSeeder::class,
            
            CategoryFilmSeeder::class,
            ActorFilmSeeder::class,
            FilmUserSeeder::class,
            AwardFilmSeeder::class,
            RatingFilmSeeder::class,

            SerieSeeder::class,
            SeasonSeeder::class,
            EpisodeSeeder::class,
            CategorySerieSeeder::class,
            ActorSerieSeeder::class,
            AwardSeriesSeeder::class,
            RatingSerieSeeder::class,

        ]);
    }
}
