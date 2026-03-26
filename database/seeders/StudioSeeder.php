<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Studio;


class StudioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("studios")->insert([
        
        // Nomes das produtoras de anime, os estúdios
            ['name' => 'Kadokawa'],
            ['name' => 'Toei Animation'],
            ['name' => 'Kyoto Animation'],
            ['name' => 'Madhouse'],
            ['name' => 'Bones'],
            ['name' => 'Sunrise'],
            ['name' => 'MAPPA'],
            ['name' => 'Wit Studio'],
            ['name' => 'Ufotable'],
            ['name' => 'A-1 Pictures'],
            ['name' => 'CloverWorks'],
            ['name' => 'Production I.G'],
            ['name' => 'Studio Pierrot'],
            ['name' => 'J.C.Staff'],
            ['name' => 'Studio Trigger'],
            ['name' => 'Shaft'],
            ['name' => 'P.A. Works'],
            ['name' => 'White Fox'],
            ['name' => 'Doga Kobo'],
            ['name' => 'Silver Link'],
            ['name' => 'Studio Ghibli'],
            ['name' => 'Studio Deen'],
            ['name' => 'TMS Entertainment'],
            ['name' => 'Liden Films'],
            ['name' => 'Passione'],
            ['name' => 'Kinema Citrus'],
            ['name' => 'Science SARU'],
            ['name' => '8bit'],
            ['name' => 'David Production'],
            ['name' => 'Lerche'],
            ['name' => 'Brain\'s Base'],
            ['name' => 'Feel.'],
            ['name' => 'Gonzo'],
            ['name' => 'Satelight'],
            ['name' => 'Gainax'],
            ['name' => 'Tatsunoko Production'],
            ['name' => 'Studio Bind'],
            ['name' => 'OLM'],
            ['name' => 'Diomedéa'],
            ['name' => 'Project No.9'],
            ['name' => 'GoHands']
        ]);
    }
}