<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('animes')->insert([
            ['title' => 'Attack on Titan', 'original_title' => 'Shingeki no Kyojin', 'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 3, 'type' => 'manga', 'release_date' => '2009-09-09', 'cover_image_url' => 'mangas/attack_on_titan.jpg', 'background_url' => 'mangas/attack_on_titan_bg.jpg', 'status' => 'completed', 'story_lenght' => 'long', 'content_lenght' => 139],

            ['title' => 'One Piece', 'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 1, 'type' => 'manga', 'release_date' => '1997-07-22', 'cover_image_url' => 'mangas/one_piece.jpg', 'background_url' => 'mangas/one_piece_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'verylong', 'content_lenght' => 1000],

            ['title' => 'My Hero Academia',  'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 2, 'type' => 'manga', 'release_date' => '2014-07-07', 'cover_image_url' => 'mangas/my_hero_academia.jpg', 'background_url' => 'mangas/my_hero_academia_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 300],

            ['title' => 'Death Note', 'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 4, 'type' => 'manga', 'release_date' => '2003-04-02', 'cover_image_url' => 'mangas/death_note.jpg', 'background_url' => 'mangas/death_note_bg.jpg', 'status' => 'completed', 'story_lenght' => 'medium', 'content_lenght' => 12],

            ['title' => 'Naruto', 'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 5, 'type' => 'manga', 'release_date' => '1999-09-21', 'cover_image_url' => 'mangas/naruto.jpg', 'background_url' => 'mangas/naruto_bg.jpg', 'status' => 'completed', 'story_lenght' => 'long', 'content_lenght' => 700],

            ['title' => 'Sword Art Online', 'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 6, 'type' => 'light novel', 'release_date' => '2009-04-10', 'cover_image_url' => 'light_novels/sao.jpg', 'background_url' => 'light_novels/sao_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 30],

            ['title' => 'Re:Zero - Starting Life in Another World', 'original_title' => 'Re:Zero kara Hajimeru Isekai Seikatsu', 'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 7, 'type' => 'light novel', 'release_date' => '2014-01-20', 'cover_image_url' => 'light_novels/re_zero.jpg', 'background_url' => 'light_novels/re_zero_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 40],

            ['title' => 'The Rising of the Shield Hero', 'original_title' => 'Tate no Yuusha no Nariagari',  'description' => 'Uma história da luta da humanidade contra criaturas humanoides gigantes.', 'studio_id' => 8, 'type' => 'light novel', 'release_date' => '2013-08-22', 'cover_image_url' => 'light_novels/shield_hero.jpg', 'background_url' => 'light_novels/shield_hero_bg.jpg', 'status' => 'ongoing', 'story_lenght' => 'long', 'content_lenght' => 25],
        ]);
    }
}
