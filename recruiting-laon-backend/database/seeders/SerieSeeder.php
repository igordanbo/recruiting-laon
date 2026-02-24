<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SerieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('series')->insert([
            [
                'title' => 'Sharp Objects',
                'original_title' => 'Sharp Objects',
                'year' => 2018,
                'status' => 'released',
                'synopsis' => 'Uma repórter volta à sua cidade natal para cobrir o assassinato de duas meninas, mas enfrenta demônios do seu próprio passado enquanto investiga os crimes.',
                'director' => 'Jean-Marc Vallée',
                'image' => 'seeders/sharp.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=5y06yk07mqM',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'The Outsider',
                'original_title' => 'The Outsider',
                'year' => 2020,
                'status' => 'released',
                'synopsis' => 'Um assassinato brutal abala uma pequena cidade, e a investigação policial revela uma presença sobrenatural impossível de ignorar.',
                'director' => 'Jason Bateman',
                'image' => 'seeders/outsiders.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=V5tF3VpmI7M',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Chernobyl',
                'original_title' => 'Chernobyl',
                'year' => 2019,
                'status' => 'released',
                'synopsis' => 'Uma minissérie dramática que retrata o desastre nuclear de 1986 na Ucrânia e as consequências humanas e políticas que se seguiram.',
                'director' => 'Johan Renck',
                'image' => 'seeders/serie_2.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=s9APLXM9Ei8',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'The Crown',
                'original_title' => 'The Crown',
                'year' => 2016,
                'status' => 'released',
                'synopsis' => 'Série dramática que segue a vida da Rainha Elizabeth II desde sua ascensão ao trono, mostrando política, família e eventos históricos.',
                'director' => 'Peter Morgan',
                'image' => 'seeders/crown.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=JWtnJjn6ng0',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Clarice',
                'original_title' => 'Clarice',
                'year' => 2021,
                'status' => 'released',
                'synopsis' => 'Após os eventos de Hannibal, Clarice Starling enfrenta novos casos de assassinato enquanto lida com traumas do passado e seu próprio crescimento pessoal.',
                'director' => 'Alex Kurtzman',
                'image' => 'seeders/clarice.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=Wz2S-lZ1N70',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Ozark',
                'original_title' => 'Ozark',
                'year' => 2017,
                'status' => 'released',
                'synopsis' => 'Um consultor financeiro se muda com sua família para os Ozarks para lavar dinheiro para um cartel de drogas, enfrentando perigos cada vez maiores.',
                'director' => 'Jason Bateman',
                'image' => 'seeders/ozark.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=psU98wz3y3U',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
