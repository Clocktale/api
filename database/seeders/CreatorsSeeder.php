<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Creators;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('creators')->insert([

            // Mangakas (autor + ilustrador)
            ['name' => 'Koyoharu Gotouge',     'primary_role' => 'mangaka'],  // Demon Slayer  
            ['name' => 'ONE',                  'primary_role' => 'mangaka'],  // One Punch Man, Mob Psycho  
            ['name' => 'Tite Kubo',            'primary_role' => 'mangaka'],  // Bleach  
            ['name' => 'Eiichiro Oda',         'primary_role' => 'mangaka'],  // One Piece  
            ['name' => 'Masashi Kishimoto',    'primary_role' => 'mangaka'],  // Naruto, Samurai 8  
            ['name' => 'Akira Toriyama',       'primary_role' => 'mangaka'],  // Dragon Ball  
            ['name' => 'Hajime Isayama',       'primary_role' => 'mangaka'],  // Attack on Titan  
            ['name' => 'Yoshihiro Togashi',    'primary_role' => 'mangaka'],  // Hunter x Hunter, Yu Yu Hakusho  
            ['name' => 'Naoko Takeuchi',       'primary_role' => 'mangaka'],  // Sailor Moon  
            ['name' => 'CLAMP',                'primary_role' => 'mangaka'],  // Cardcaptor Sakura  
            ['name' => 'Nobuhiro Watsuki',     'primary_role' => 'mangaka'],  // Rurouni Kenshin  
            ['name' => 'Katsura Hoshino',      'primary_role' => 'mangaka'],  // D.Gray-man  
            ['name' => 'Kōhei Horikoshi',      'primary_role' => 'mangaka'],  // My Hero Academia  
            ['name' => 'Yūsei Matsui',         'primary_role' => 'mangaka'],  // Assassination Classroom  
            ['name' => 'Yūji Iwahara',         'primary_role' => 'mangaka'],  // Cat Paradise  
            ['name' => 'Tsutomu Nihei',        'primary_role' => 'mangaka'],  // Blame!  
            ['name' => 'Hiro Mashima',         'primary_role' => 'mangaka'],  // Fairy Tail  
            ['name' => 'Kōhei Azano',          'primary_role' => 'mangaka'],  // GetBackers  
            ['name' => 'Takeshi Konomi',       'primary_role' => 'mangaka'],  // Prince of Tennis  
            ['name' => 'Hiroshi Takahashi',    'primary_role' => 'mangaka'],  // Crows, Worst  
            ['name' => 'Tsugumi Ohba',         'primary_role' => 'mangaka'],  // Death Note, Bakuman, Platinum End  

            // Autores
            ['name' => 'Rifujin na Magonote',  'primary_role' => 'author'],   // Mushoku Tensei  
            ['name' => 'Reki Kawahara',        'primary_role' => 'author'],   // SAO, Accel World  
            ['name' => 'Masashi Sogo',         'primary_role' => 'author'],   // The Rising of the Shield Hero  
            ['name' => 'Yoshitoki Ōima',       'primary_role' => 'author'],   // A Silent Voice  
            ['name' => 'Nisio Isin',           'primary_role' => 'author'],   // Monogatari Series  
            ['name' => 'Satoshi Wagahara',     'primary_role' => 'author'],   // The Devil is a Part-Timer!  

            // Ilustradores
            ['name' => 'Takeshi Obata',        'primary_role' => 'illustrator'],  // Death Note, Bakuman  
            ['name' => 'ABEC',                 'primary_role' => 'illustrator'],  // Sword Art Online  
            ['name' => 'Yuka Nakajima',        'primary_role' => 'illustrator'],  // Goblin Slayer  
            ['name' => 'Kiyotaka Haimura',     'primary_role' => 'illustrator'],  // A Certain Magical Index  
            ['name' => 'Noizi Ito',            'primary_role' => 'illustrator'],  // Haruhi Suzumiya  
            ['name' => 'Shirow Miwa',          'primary_role' => 'illustrator'],  // Tokyo Ghoul  
            ['name' => 'Eiji Usatsuka',        'primary_role' => 'illustrator'],  // Zero no Tsukaima  
            ['name' => 'Eiichi Aji',           'primary_role' => 'illustrator'],  // Oreimo  
            ['name' => 'Hiro Kanzaki',         'primary_role' => 'illustrator'],  // No Game No Life  
            ['name' => 'Yūgen Asuka',          'primary_role' => 'illustrator'],  // The Devil is a Part-Timer!  
            ['name' => 'Kōsuke Fujishima',     'primary_role' => 'illustrator'],  // Ah! My Goddess  
            ['name' => 'Yūichi Kumakura',      'primary_role' => 'illustrator'],  // Spice and Wolf  
            ['name' => 'Hiroshi Takashige',    'primary_role' => 'illustrator'],  // Darker than Black  

        ]);
    }
}
