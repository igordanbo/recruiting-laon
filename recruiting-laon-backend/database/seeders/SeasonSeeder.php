<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeasonSeeder extends Seeder
{
    public function run(): void
    {
        $seriesCount = 6; // para 6 series
        $seasons = [];

        for ($seriesId = 1; $seriesId <= $seriesCount; $seriesId++) {
            for ($seasonNumber = 1; $seasonNumber <= 2; $seasonNumber++) {
                $seasons[] = [
                    'serie_id' => $seriesId,
                    'title' => "Temporada $seasonNumber",
                    'season_number' => $seasonNumber,
                    'year' => 2018 + $seasonNumber + $seriesId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        DB::table('seasons')->insert($seasons);
    }
}
