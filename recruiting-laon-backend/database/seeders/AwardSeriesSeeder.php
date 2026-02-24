<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AwardSeriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('awards_series')->insert([
            [
                'serie_id' => 1,
                'title' => 'Oscar de Melhor Roteiro Original (2021)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 1,
                'title' => 'Indicação ao Oscar de Melhor Filme (2021)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'serie_id' => 2,
                'title' => 'Oscar de Melhor Roteiro Original (2014)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 2,
                'title' => 'Globo de Ouro de Melhor Roteiro (2014)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'serie_id' => 3,
                'title' => 'Critics Choice Award de Melhor Filme de Ficção Científica (2019)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'serie_id' => 4,
                'title' => 'Oscar de Melhores Efeitos Visuais (1978)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 4,
                'title' => 'Oscar de Melhor Trilha Sonora Original (1978)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 4,
                'title' => 'Oscar de Melhor Direção de Arte (1978)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'serie_id' => 5,
                'title' => 'Oscar de Melhor Roteiro Adaptado (2020)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'serie_id' => 5,
                'title' => 'Indicação ao Oscar de Melhor Filme (2020)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'serie_id' => 6,
                'title' => 'People’s Choice Award de Filme de Ação (2021)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
