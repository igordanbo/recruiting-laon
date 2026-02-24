<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EpisodeSeeder extends Seeder
{
    public function run(): void
    {
        $episodes = [];
        $seriesCount = 6;
        $seasonsPerSeries = 2;
        $episodesPerSeason = 3;

        for ($seriesId = 1; $seriesId <= $seriesCount; $seriesId++) {
            for ($seasonNumber = 1; $seasonNumber <= $seasonsPerSeries; $seasonNumber++) {
                $seasonId = (($seriesId - 1) * $seasonsPerSeries) + $seasonNumber;

                for ($episodeNumber = 1; $episodeNumber <= $episodesPerSeason; $episodeNumber++) {
                    $episodes[] = [
                        'season_id' => $seasonId,
                        'title' => "Episódio $episodeNumber",
                        'episode_number' => $episodeNumber,
                        'duration' => 45 + $episodeNumber * 5,
                        'synopsis' => "Sinopse do episódio $episodeNumber da temporada $seasonNumber da série $seriesId.",
                        'video_url' => "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }
            }
        }

        DB::table('episodes')->insert($episodes);
    }
}
