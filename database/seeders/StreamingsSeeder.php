<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('streamings')->insert([
            ['name' => 'Netflix', 'url' => 'https://www.netflix.com/', 'logo_url' => 'streamings/netflix_logo.png'],
            ['name' => 'Amazon Prime Video', 'url' => 'https://www.amazon.com/prime-video', 'logo_url' => 'streamings/amazon_prime_logo.png'],
            ['name' => 'Hulu', 'url' => 'https://www.hulu.com/', 'logo_url' => 'streamings/hulu_logo.png'],
            ['name' => 'Disney+', 'url' => 'https://www.disneyplus.com/', 'logo_url' => 'streamings/disney_plus_logo.png'],
            ['name' => 'HBO Max', 'url' => 'https://www.hbomax.com/', 'logo_url' => 'streamings/hbo_max_logo.png'],
            ['name' => 'Apple TV+', 'url' => 'https://www.apple.com/apple-tv-plus/', 'logo_url' => 'streamings/apple_tv_plus_logo.png'],
            ['name' => 'Crunchyroll', 'url' => 'https://www.crunchyroll.com/', 'logo_url' => 'streamings/crunchyroll_logo.png'],
            ['name' => 'Funimation', 'url' => 'https://www.funimation.com/', 'logo_url' => 'streamings/funimation_logo.png'],
            ['name' => 'Paramount+', 'url' => 'https://www.paramountplus.com/', 'logo_url' => 'streamings/paramount_plus_logo.png'],
            ['name' => 'Peacock', 'url' => 'https://www.peacocktv.com/', 'logo_url' => 'streamings/peacock_logo.png'],
            ['name' => 'Discovery+', 'url' => 'https://www.discoveryplus.com/', 'logo_url' => 'streamings/discovery_plus_logo.png'],
        ]);
    }
}
