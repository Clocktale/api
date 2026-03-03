<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use App\Models\Contents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //mangas
        DB::table('contents')->insert([
            //mangas
            ['title' => 'Attack on Titan', 'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'publisher_id' => 3, 'type' => 'manga', 'release_date' => '2009-09-09', 'cover_image_url' => 'mangas/attack_on_titan.jpg', 'background_url' => 'mangas/attack_on_titan_bg.jpg', 'status' => 'completed', 'story_lenght' => 'long', 'content_lenght' => 139],
            
            ['title' => 'One Piece', 'description' => 'As aventuras de Monkey D. Luffy e sua tripulação pirata em busca do tesouro One Piece.', 'publisher_id' => 1, 'type' => 'manga', 'release_date' => '1997-07-22', 'cover_image_url' => 'mangas/one_piece.jpg', 'background_url' => 'mangas/one_piece_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'verylong', 'content_lenght' => 1000],

            ['title' => 'My Hero Academia', 'description' => 'Em um mundo onde as pessoas possuem superpoderes chamados "Individualidades".', 'publisher_id' => 2, 'type' => 'manga', 'release_date' => '2014-07-07', 'cover_image_url' => 'mangas/my_hero_academia.jpg', 'background_url' => 'mangas/my_hero_academia_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 300],

            ['title' => 'Death Note', 'description' => 'Um thriller psicológico sobre um estudante do ensino médio que descobre um caderno que permite matar qualquer pessoa ao escrever seu nome nele.', 'publisher_id' => 3, 'type' => 'manga', 'release_date' => '2003-04-02', 'cover_image_url' => 'mangas/death_note.jpg', 'background_url' => 'mangas/death_note_bg.jpg', 'status' => 'completed', 'story_lenght' => 'medium', 'content_lenght' => 12],

            ['title' => 'Naruto', 'description' => 'A história de Naruto Uzumaki, um jovem ninja com o sonho de se tornar o mais forte e líder de sua vila.', 'publisher_id' => 1, 'type' => 'manga', 'release_date' => '1999-09-21', 'cover_image_url' => 'mangas/naruto.jpg', 'background_url' => 'mangas/naruto_bg.jpg', 'status' => 'completed', 'story_lenght' => 'long', 'content_lenght' => 700],


            //light novels
            ['title' => 'Sword Art Online', 'description' => 'Um jogo de realidade virtual onde os jogadores ficam presos e devem completar o jogo para escapar.', 'publisher_id' => 5, 'type' => 'light novel', 'release_date' => '2009-04-10', 'cover_image_url' => 'light_novels/sao.jpg', 'background_url' => 'light_novels/sao_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 30],

            ['title' => 'Re:Zero - Starting Life in Another World', 'description' => 'Um jovem é transportado para um mundo de fantasia e descobre que pode voltar no tempo ao morrer.', 'publisher_id' => 6, 'type' => 'light novel', 'release_date' => '2014-01-20', 'cover_image_url' => 'light_novels/re_zero.jpg', 'background_url' => 'light_novels/re_zero_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 40],

            ['title' => 'The Rising of the Shield Hero', 'description' => 'Um homem é convocado para outro mundo como um dos quatro heróis lendários.', 'publisher_id' => 7, 'type' => 'light novel', 'release_date' => '2013-08-22', 'cover_image_url' => 'light_novels/shield_hero.jpg', 'background_url' => 'light_novels/shield_hero_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 25],

            ['title' => "No Game No Life", "description" => "Dois irmãos são transportados para um mundo onde tudo é decidido por jogos.", "publisher_id" => 8, "type" => "light novel", "release_date" => "2012-04-25", "cover_image_url" => "light_novels/no_game_no_life.jpg", "background_url" => "light_novels/no_game_no_life_bg.jpg", "status" => "ongoing", "story_lenght" => "medium", "content_lenght" => 12],
        ]);
    }
}
