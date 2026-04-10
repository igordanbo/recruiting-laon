<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SerieSeeder extends Seeder
{
    public function run(): void
    {
        $series = [

            [
                'title' => 'Sharp Objects',
                'original_title' => 'Sharp Objects',
                'year' => 2018,
                'synopsis' => 'Uma repórter volta à sua cidade natal...',
                'director' => 'Jean-Marc Vallée',
                'image' => 'sharp.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=5y06yk07mqM',
                'status' => 'released',
            ],

            [
                'title' => 'The Outsider',
                'original_title' => 'The Outsider',
                'year' => 2020,
                'synopsis' => 'Um assassinato brutal...',
                'director' => 'Jason Bateman',
                'image' => 'outsiders.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=V5tF3VpmI7M',
                'status' => 'released',
            ],

            [
                'title' => 'Chernobyl',
                'original_title' => 'Chernobyl',
                'year' => 2019,
                'synopsis' => 'Uma minissérie dramática...',
                'director' => 'Johan Renck',
                'image' => 'serie_2.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=s9APLXM9Ei8',
                'status' => 'released',
            ],

            [
                'title' => 'The Crown',
                'original_title' => 'The Crown',
                'year' => 2016,
                'synopsis' => 'Série dramática que segue...',
                'director' => 'Peter Morgan',
                'image' => 'crown.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=JWtnJjn6ng0',
                'status' => 'released',
            ],

            [
                'title' => 'Clarice',
                'original_title' => 'Clarice',
                'year' => 2021,
                'synopsis' => 'Após os eventos de Hannibal...',
                'director' => 'Alex Kurtzman',
                'image' => 'clarice.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=Wz2S-lZ1N70',
                'status' => 'released',
            ],

            [
                'title' => 'Ozark',
                'original_title' => 'Ozark',
                'year' => 2017,
                'synopsis' => 'Um consultor financeiro...',
                'director' => 'Jason Bateman',
                'image' => 'ozark.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=psU98wz3y3U',
                'status' => 'released',
            ],

            [
                'title' => 'Atirador',
                'original_title' => 'Shooter',
                'year' => 2016,
                'synopsis' => 'Um atirador de elite...',
                'director' => 'John Hlavin',
                'image' => 'atirador.png',
                'trailer_url' => 'https://www.youtube.com/watch?v=_SxEujt8mIM',
                'status' => 'released',
            ],

            [
                'title' => 'Breaking Bad',
                'original_title' => 'Breaking Bad',
                'year' => 2008,
                'synopsis' => 'Um professor de química...',
                'director' => 'Vince Gilligan',
                'image' => 'breaking-bad.png',
                'trailer_url' => 'https://www.youtube.com/watch?v=HhesaQXLuRY',
                'status' => 'released',
            ],

            [
                'title' => 'O Gambito da Rainha',
                'original_title' => 'The Queen\'s Gambit',
                'year' => 2020,
                'synopsis' => 'Uma jovem prodígio...',
                'director' => 'Scott Frank',
                'image' => 'gambito-da-rainha.png',
                'trailer_url' => 'https://www.youtube.com/watch?v=CDrieqwSdgI',
                'status' => 'released',
            ],

            [
                'title' => 'La Casa de Papel',
                'original_title' => 'La Casa de Papel',
                'year' => 2017,
                'synopsis' => 'Um grupo de criminosos...',
                'director' => 'Álex Pina',
                'image' => 'la-casa-de-papel.png',
                'trailer_url' => 'https://www.youtube.com/watch?v=hfVv3ZyX7uY',
                'status' => 'released',
            ],

            [
                'title' => 'Prison Break',
                'original_title' => 'Prison Break',
                'year' => 2005,
                'synopsis' => 'Um homem elabora...',
                'director' => 'Paul Scheuring',
                'image' => 'prison-break.png',
                'trailer_url' => 'https://www.youtube.com/watch?v=AL9zLctDJaU',
                'status' => 'released',
            ],

            [
                'title' => 'You',
                'original_title' => 'You',
                'year' => 2018,
                'synopsis' => 'Um gerente de livraria...',
                'director' => 'Greg Berlanti & Sera Gamble',
                'image' => 'you.png',
                'trailer_url' => 'https://www.youtube.com/watch?v=xAN1ThhTWsE',
                'status' => 'released',
            ],
        ];

        foreach ($series as $serie) {

            $localPath = database_path('seeders/images/' . $serie['image']);

            if (!file_exists($localPath)) {
                echo "Imagem não encontrada: {$localPath}\n";
                continue;
            }

            $fileName = 'series/' . Str::random(40) . '.' . pathinfo($localPath, PATHINFO_EXTENSION);

            Storage::disk('s3')->put($fileName, file_get_contents($localPath));

            DB::table('series')->insert([
                'title' => $serie['title'],
                'original_title' => $serie['original_title'],
                'year' => $serie['year'],
                'synopsis' => $serie['synopsis'],
                'director' => $serie['director'],
                'image' => $fileName,
                'trailer_url' => $serie['trailer_url'],
                'status' => $serie['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}