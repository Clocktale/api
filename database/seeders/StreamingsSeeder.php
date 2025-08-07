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
            ['streaming_name' => 'Netflix', 'logo_image_url' => 'streamings/netflix_logo.png'],
            ['streaming_name' => 'Amazon Prime Video', 'logo_image_url' => 'streamings/amazon_prime_logo.png'],
            ['streaming_name' => 'Hulu', 'logo_image_url' => 'streamings/hulu_logo.png'],
            ['streaming_name' => 'Disney+', 'logo_image_url' => 'streamings/disney_plus_logo.png'],
            ['streaming_name' => 'HBO Max', 'logo_image_url' => 'streamings/hbo_max_logo.png'],
            ['streaming_name' => 'Apple TV+', 'logo_image_url' => 'streamings/apple_tv_plus_logo.png'],
            ['streaming_name' => 'Crunchyroll', 'logo_image_url' => 'streamings/crunchyroll_logo.png'],
            ['streaming_name' => 'Funimation', 'logo_image_url' => 'streamings/funimation_logo.png'],
            ['streaming_name' => 'Paramount+', 'logo_image_url' => 'streamings/paramount_plus_logo.png'],
            ['streaming_name' => 'Peacock', 'logo_image_url' => 'streamings/peacock_logo.png'],
            ['streaming_name' => 'Discovery+', 'logo_image_url' => 'streamings/discovery_plus_logo.png'],
        ]);
    }
}
