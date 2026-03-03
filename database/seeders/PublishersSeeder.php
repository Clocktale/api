<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publishers')->insert([
            ['publisher_name' => 'Shueisha'],
            ['publisher_name' => 'Kadokawa'],
            ['publisher_name' => 'Kodansha'],
            ['publisher_name' => 'Square Enix'],
            ['publisher_name' => 'Yen Press'],
            ['publisher_name' => 'Viz Media'],
            ['publisher_name' => 'Dark Horse Comics'],
            ['publisher_name' => 'Seven Seas Entertainment'],
            ['publisher_name' => 'Tokyopop'],
            ['publisher_name' => 'Vertical Comics'],
            ['publisher_name' => 'J-Novel Club'],
            ['publisher_name' => 'Manga Entertainment'],
            ['publisher_name' => 'Crunchyroll Manga'],
            ['publisher_name' => 'Comixology Originals'],
            ['publisher_name' => 'Kodansha Comics'],
            ['publisher_name' => 'Futabasha'],
            ['publisher_name' => 'Hachette Livre'],
            ['publisher_name' => 'Glénat'],
            ['publisher_name' => 'Panini Comics'],
            ['publisher_name' => 'Image Comics'],
            ['publisher_name' => 'Dark Horse Manga'],
            ['publisher_name' => 'Tokuma Shoten'],
            ['publisher_name' => 'Hakusensha'],
            ['publisher_name' => 'Shogakukan'],
            ['publisher_name' => 'Fujimi Shobo'],
            ['publisher_name' => 'ASCII Media Works'],
            ['publisher_name' => 'Shinchosha'],
            ['publisher_name' => 'Shueisha International'],
            ['publisher_name' => 'Manga Factory'],
            ['publisher_name' => 'Manga Planet'],
            ['publisher_name' => 'Manga Box'],
            ['publisher_name' => 'Manga UP!'],
            ['publisher_name' => 'Manga Plus'],
            ['publisher_name' => 'Manga Club'],
        ]);
    }
}
