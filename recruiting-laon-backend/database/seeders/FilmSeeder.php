<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('films')->insert([

            [
                'title' => 'Bela Vingança',
                'original_title' => 'Promising Young Woman',
                'year' => 2020,
                'duration' => 113,
                'synopsis' => 'Nada na vida de Cassie é o que parece ser. Ela é perversamente inteligente, tentadoramente astuta e ainda vive uma vida dupla secreta à noite. Agora, um encontro inesperado está prestes a dar a Cassie a chance de corrigir os erros do passado.',
                'director' => 'Emerald Fennell',
                'image' => 'seeders/bela_vinganca.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Her',
                'original_title' => 'Her',
                'year' => 2013,
                'duration' => 126,
                'synopsis' => 'Em um futuro próximo, Theodore é um homem solitário que desenvolve uma relação improvável com um sistema operacional dotado de inteligência artificial. À medida que a conexão entre eles se aprofunda, ele passa a questionar os limites entre tecnologia, emoção e o que realmente significa amar.',
                'director' => 'Spike Jonze',
                'image' => 'seeders/her.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Um Lugar Silencioso',
                'original_title' => 'A Quiet Place',
                'year' => 2018,
                'duration' => 90,
                'synopsis' => 'Em um mundo devastado por criaturas misteriosas que caçam através do som, uma família precisa viver em completo silêncio para sobreviver. Cada movimento é calculado e cada ruído pode ser fatal, enquanto lutam para proteger seus filhos em meio a um ambiente de constante tensão.',
                'director' => 'John Krasinski',
                'image' => 'seeders/um_lugar_silencioso.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Star Wars',
                'original_title' => 'Star Wars: Episode IV - A New Hope',
                'year' => 1977,
                'duration' => 121,
                'synopsis' => 'Em uma galáxia muito distante, o jovem Luke Skywalker embarca em uma jornada épica ao lado de aliados improváveis para enfrentar o Império Galáctico. Guiado pela Força e por novos mentores, ele descobre seu destino enquanto a Rebelião luta para restaurar a esperança no universo.',
                'director' => 'George Lucas',
                'image' => 'seeders/star_wars.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Jojo Rabbit',
                'original_title' => 'Jojo Rabbit',
                'year' => 2019,
                'duration' => 108,
                'synopsis' => 'Durante a Segunda Guerra Mundial, um jovem alemão extremamente patriota descobre que sua mãe está escondendo uma garota judia em casa. Com a ajuda de seu amigo imaginário — uma versão caricata de Hitler — ele começa a questionar suas crenças e aprende lições inesperadas sobre humanidade e tolerância.',
                'director' => 'Taika Waititi',
                'image' => 'seeders/jojo_rabbit.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Viúva Negra',
                'original_title' => 'Black Widow',
                'year' => 2021,
                'duration' => 134,
                'synopsis' => 'Natasha Romanoff confronta capítulos obscuros de seu passado quando surge uma conspiração ligada à sua antiga vida como espiã. Forçada a enfrentar velhos inimigos e alianças quebradas, ela precisa revisitar sua história antes de se tornar oficialmente uma Vingadora.',
                'director' => 'Cate Shortland',
                'image' => 'seeders/viuva_negra.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Rick and Morty',
                'original_title' => 'Rick and Morty',
                'year' => 2021,
                'duration' => 134,
                'synopsis' => 'Natasha Romanoff confronta capítulos obscuros de seu passado quando surge uma conspiração ligada à sua antiga vida como espiã. Forçada a enfrentar velhos inimigos e alianças quebradas, ela precisa revisitar sua história antes de se tornar oficialmente uma Vingadora.',
                'director' => 'Cate Shortland',
                'image' => 'seeders/rick.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'upcoming',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Lucca',
                'original_title' => 'Lucca',
                'year' => 2021,
                'duration' => 134,
                'synopsis' => 'Natasha Romanoff confronta capítulos obscuros de seu passado quando surge uma conspiração ligada à sua antiga vida como espiã. Forçada a enfrentar velhos inimigos e alianças quebradas, ela precisa revisitar sua história antes de se tornar oficialmente uma Vingadora.',
                'director' => 'Cate Shortland',
                'image' => 'seeders/lucca.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'upcoming',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ]);
    }
}
