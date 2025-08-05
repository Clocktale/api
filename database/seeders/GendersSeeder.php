<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->insert([
            ['name' => 'Shounen',  'image_url' => 'teste'],
            ['name' => 'Seinen',   'image_url' => 'teste'],
            ['name' => 'Isekai',   'image_url' => 'teste'],
            ['name' => 'Romance',  'image_url' => 'teste'],
            ['name' => 'Fantasia', 'image_url' => 'teste'],
            ['name' => 'Comédia',  'image_url' => 'teste'],
            ['name' => 'Drama',    'image_url' => 'teste'],
            ['name' => 'Ação',     'image_url' => 'teste'],
            ['name' => 'Aventura', 'image_url' => 'teste'],
            ['name' => 'Slice of Life', 'image_url' => 'teste'],
            ['name' => 'Horror',  'image_url' => 'teste'],
            ['name' => 'Mystery', 'image_url' => 'teste'],
            ['name' => 'Sci-Fi',   'image_url' => 'teste'],
            ['name' => 'Supernatural', 'image_url' => 'teste'],
        ]);
    }
}
