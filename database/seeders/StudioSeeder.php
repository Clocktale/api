<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudioSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $names = [
            'Kadokawa',
            'Toei Animation',
            'Kyoto Animation',
            'Madhouse',
            'Bones',
            'Sunrise',
            'MAPPA',
            'Wit Studio',
            'Ufotable',
            'A-1 Pictures',
            'CloverWorks',
            'Production I.G',
            'Studio Pierrot',
            'J.C.Staff',
            'Studio Trigger',
            'Shaft',
            'P.A. Works',
            'White Fox',
            'Doga Kobo',
            'Silver Link',
            'Studio Ghibli',
            'Studio Deen',
            'TMS Entertainment',
            'Liden Films',
            'Passione',
            'Kinema Citrus',
            'Science SARU',
            '8bit',
            'David Production',
            'Lerche',
            'Brain\'s Base',
            'Feel.',
            'Gonzo',
            'Satelight',
            'Gainax',
            'Tatsunoko Production',
            'Studio Bind',
            'OLM',
            'Diomedéa',
            'Project No.9',
            'GoHands',
        ];

        // Garante nomes únicos na lista e ignora linhas já existentes (índice unique em name).
        $names = array_values(array_unique($names));

        $rows = array_map(
            fn (string $name) => [
                'name' => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            $names
        );

        DB::table('studios')->insertOrIgnore($rows);
    }
}
