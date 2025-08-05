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
            ['id' => 1, 'publisher_name' => 'Shueisha'],
            ['id' => 2, 'publisher_name' => 'Kadokawa'],
            ['id' => 3, 'publisher_name' => 'Kodansha'],
            ['id' => 4, 'publisher_name' => 'Square Enix'],
            ['id' => 5, 'publisher_name' => 'Yen Press'],
            ['id' => 6, 'publisher_name' => 'Viz Media'],
            ['id' => 7, 'publisher_name' => 'Dark Horse Comics'],
            ['id' => 8, 'publisher_name' => 'Seven Seas Entertainment'],
            ['id' => 9, 'publisher_name' => 'Tokyopop'],
            ['id' => 10, 'publisher_name' => 'Vertical Comics'],
            ['id' => 11, 'publisher_name' => 'J-Novel Club'],
            ['id' => 12, 'publisher_name' => 'Manga Entertainment'],
            ['id' => 13, 'publisher_name' => 'Crunchyroll Manga'],
            ['id' => 14, 'publisher_name' => 'Comixology Originals'],
            ['id' => 15, 'publisher_name' => 'Kodansha Comics'],
            ['id' => 16, 'publisher_name' => 'Futabasha'],
            ['id' => 17, 'publisher_name' => 'Hachette Livre'],
            ['id' => 18, 'publisher_name' => 'Glénat'],
            ['id' => 19, 'publisher_name' => 'Panini Comics'],
            ['id' => 20, 'publisher_name' => 'Image Comics'],
            ['id' => 21, 'publisher_name' => 'Dark Horse Manga'],
            ['id' => 22, 'publisher_name' => 'Tokuma Shoten'],
            ['id' => 23, 'publisher_name' => 'Hakusensha'],
            ['id' => 24, 'publisher_name' => 'Shogakukan'],
            ['id' => 25, 'publisher_name' => 'Fujimi Shobo'],
            ['id' => 26, 'publisher_name' => 'ASCII Media Works'],
            ['id' => 27, 'publisher_name' => 'Shinchosha'],
            ['id' => 28, 'publisher_name' => 'Shueisha International'],
            ['id' => 29, 'publisher_name' => 'Manga Factory'],
            ['id' => 30, 'publisher_name' => 'Manga Planet'],
            ['id' => 31, 'publisher_name' => 'Manga Box'],
            ['id' => 32, 'publisher_name' => 'Manga UP!'],
            ['id' => 33, 'publisher_name' => 'Manga Plus'],
            ['id' => 34, 'publisher_name' => 'Manga Club'],
        ]);
    }
}
