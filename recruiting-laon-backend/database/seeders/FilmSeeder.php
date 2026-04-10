<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = [

            [
                'title' => 'Bela Vingança',
                'original_title' => 'Promising Young Woman',
                'year' => 2020,
                'duration' => 113,
                'synopsis' => 'Nada na vida de Cassie é o que parece ser. Ela é perversamente inteligente, tentadoramente astuta e ainda vive uma vida dupla secreta à noite. Agora, um encontro inesperado está prestes a dar a Cassie a chance de corrigir os erros do passado.',
                'director' => 'Emerald Fennell',
                'image' => 'bela_vinganca.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
            ],

            [
                'title' => 'Her',
                'original_title' => 'Her',
                'year' => 2013,
                'duration' => 126,
                'synopsis' => 'Em um futuro próximo, Theodore é um homem solitário que desenvolve uma relação improvável com um sistema operacional dotado de inteligência artificial. À medida que a conexão entre eles se aprofunda, ele passa a questionar os limites entre tecnologia, emoção e o que realmente significa amar.',
                'director' => 'Spike Jonze',
                'image' => 'her.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
            ],

            [
                'title' => 'Um Lugar Silencioso',
                'original_title' => 'A Quiet Place',
                'year' => 2018,
                'duration' => 90,
                'synopsis' => 'Em um mundo devastado por criaturas misteriosas que caçam através do som, uma família precisa viver em completo silêncio para sobreviver. Cada movimento é calculado e cada ruído pode ser fatal, enquanto lutam para proteger seus filhos em meio a um ambiente de constante tensão.',
                'director' => 'John Krasinski',
                'image' => 'um_lugar_silencioso.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
            ],

            [
                'title' => 'Star Wars',
                'original_title' => 'Star Wars: Episode IV - A New Hope',
                'year' => 1977,
                'duration' => 121,
                'synopsis' => 'Em uma galáxia muito distante, o jovem Luke Skywalker embarca em uma jornada épica ao lado de aliados improváveis para enfrentar o Império Galáctico. Guiado pela Força e por novos mentores, ele descobre seu destino enquanto a Rebelião luta para restaurar a esperança no universo.',
                'director' => 'George Lucas',
                'image' => 'star_wars.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
            ],

            [
                'title' => 'Jojo Rabbit',
                'original_title' => 'Jojo Rabbit',
                'year' => 2019,
                'duration' => 108,
                'synopsis' => 'Durante a Segunda Guerra Mundial, um jovem alemão extremamente patriota descobre que sua mãe está escondendo uma garota judia em casa. Com a ajuda de seu amigo imaginário — uma versão caricata de Hitler — ele começa a questionar suas crenças e aprende lições inesperadas sobre humanidade e tolerância.',
                'director' => 'Taika Waititi',
                'image' => 'jojo_rabbit.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
            ],

            [
                'title' => 'Viúva Negra',
                'original_title' => 'Black Widow',
                'year' => 2021,
                'duration' => 134,
                'synopsis' => 'Natasha Romanoff confronta capítulos obscuros de seu passado quando surge uma conspiração ligada à sua antiga vida como espiã. Forçada a enfrentar velhos inimigos e alianças quebradas, ela precisa revisitar sua história antes de se tornar oficialmente uma Vingadora.',
                'director' => 'Cate Shortland',
                'image' => 'viuva_negra.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'released',
            ],

            [
                'title' => 'Rick and Morty',
                'original_title' => 'Rick and Morty',
                'year' => 2021,
                'duration' => 134,
                'synopsis' => 'Natasha Romanoff confronta capítulos obscuros de seu passado quando surge uma conspiração ligada à sua antiga vida como espiã. Forçada a enfrentar velhos inimigos e alianças quebradas, ela precisa revisitar sua história antes de se tornar oficialmente uma Vingadora.',
                'director' => 'Cate Shortland',
                'image' => 'rick.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'upcoming',
            ],

            [
                'title' => 'Lucca',
                'original_title' => 'Lucca',
                'year' => 2021,
                'duration' => 134,
                'synopsis' => 'Natasha Romanoff confronta capítulos obscuros de seu passado quando surge uma conspiração ligada à sua antiga vida como espiã. Forçada a enfrentar velhos inimigos e alianças quebradas, ela precisa revisitar sua história antes de se tornar oficialmente uma Vingadora.',
                'director' => 'Cate Shortland',
                'image' => 'lucca.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=7i5kiFDunk8',
                'status' => 'upcoming',
            ],

            [
                'title' => 'Batman: O Cavaleiro das Trevas',
                'original_title' => 'The Dark Knight',
                'year' => 2008,
                'duration' => 152,
                'synopsis' => 'Batman enfrenta o Coringa, um criminoso caótico que mergulha Gotham no caos e força o herói a confrontar seus próprios limites morais.',
                'director' => 'Christopher Nolan',
                'image' => 'batman.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=EXeTwQWrcwY',
                'status' => 'released',
            ],

            [
                'title' => 'Confusões Pra Cachorro',
                'original_title' => 'Show Dogs',
                'year' => 2018,
                'duration' => 92,
                'synopsis' => 'Um cão policial precisa se infiltrar em um concurso de beleza canino para impedir um esquema ilegal de tráfico de animais.',
                'director' => 'Raja Gosnell',
                'image' => 'confusao-pra-cachorro.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=1d0Zf9sXlHk',
                'status' => 'released',
            ],

            [
                'title' => 'Golpe Duplo',
                'original_title' => 'Focus',
                'year' => 2015,
                'duration' => 105,
                'synopsis' => 'Um experiente vigarista se envolve com uma iniciante no mundo dos golpes, mas a relação entre os dois complica seus planos.',
                'director' => 'Glenn Ficarra & John Requa',
                'image' => 'golpe-duplo.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=MxCRgtdAuBo',
                'status' => 'released',
            ],

            [
                'title' => 'Interestelar',
                'original_title' => 'Interstellar',
                'year' => 2014,
                'duration' => 169,
                'synopsis' => 'Um grupo de exploradores viaja através de um buraco de minhoca no espaço em busca de um novo lar para a humanidade.',
                'director' => 'Christopher Nolan',
                'image' => 'interestelar.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=zSWdZVtXT7E',
                'status' => 'released',
            ],

            [
                'title' => 'One Piece',
                'original_title' => 'One Piece',
                'year' => 2023,
                'duration' => 60,
                'synopsis' => 'Monkey D. Luffy e sua tripulação embarcam em uma jornada épica pelos mares em busca do lendário tesouro One Piece.',
                'director' => 'Matt Owens & Steven Maeda',
                'image' => 'one-piece.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=Ades3pQbeh8',
                'status' => 'released',
            ],

            [
                'title' => 'Vingadores: Ultimato',
                'original_title' => 'Avengers: Endgame',
                'year' => 2019,
                'duration' => 181,
                'synopsis' => 'Após os eventos devastadores causados por Thanos, os Vingadores restantes se unem para reverter o destino do universo.',
                'director' => 'Anthony Russo & Joe Russo',
                'image' => 'vingadores-ultimato.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=TcMBFSGVi1c',
                'status' => 'released',
            ],
        ];

        foreach ($films as $film) {

            $localPath = database_path('seeders/images/' . $film['image']);

            $fileName = 'films/' . Str::random(40) . '.' . pathinfo($localPath, PATHINFO_EXTENSION);

            Storage::disk('s3')->put($fileName, file_get_contents($localPath));

            DB::table('films')->insert([
                'title' => $film['title'],
                'original_title' => $film['original_title'],
                'year' => $film['year'],
                'duration' => $film['duration'],
                'synopsis' => $film['synopsis'],
                'director' => $film['director'],
                'image' => $fileName,
                'trailer_url' => $film['trailer_url'],
                'status' => $film['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
