<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Shõnen', 'description' => 'Shõnen é um gênero de anime que é caracterizado por ser mais leve e divertido, com histórias mais simples e fáceis de entender.'],
            ['name' => 'Seinen', 'description' => 'Seinen é uma demografia de mangás e animes voltada primariamente para o público masculino adulto, tipicamente entre 20 e 50 anos, embora seja uma classificação editorial e não um gênero em si.'],
            ['name' => 'Shojo', 'description' => ' Shojo é uma categoria de mangás e animes direcionada principalmente ao público feminino jovem, geralmente entre as idades de 10 e 18 anos.'],
            ['name' => 'Josei', 'description' => 'josei não é um gênero narrativo, mas sim uma demografia, ou seja, uma categoria de público-alvo focada em mulheres jovens e adultas (geralmente a partir dos 18 anos).'],
            ['name' => 'Ecchi', 'description' => 'Ecchi é que categoria de animação japonesa que contém temas sensuais, sugestivos ou de comédia erótica, mas sem mostrar atos sexuais explícitos ou genitais'],
            ['name' => 'Harem', 'description' => 'Harem é uma categoria de animação japonesa que aborda histórias de romance com vários personagens femininos interessados no protagonista, geralmente com um toque de humor ou drama.'],
            ['name' => 'Slice of Life', 'description' => 'Slice of Life é uma categoria de animação japonesa que aborda a vida cotidiana de seus personagens, geralmente com um toque de humor ou drama.'],
            ['name' => 'Sports', 'description' => 'Sports é uma categoria de animação japonesa que aborda esportes, geralmente com um toque de humor ou drama.'],
        ]);
    }
}