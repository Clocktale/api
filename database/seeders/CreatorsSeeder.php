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
            ['name' => 'Koyoharu Gotouge'],  // Demon Slayer  
            ['name' => 'ONE'         ],  // One Punch Man, Mob Psycho  
            ['name' => 'Tite Kubo'      ],  // Bleach  
            ['name' => 'Eiichiro Oda'    ],  // One Piece  
            ['name' => 'Masashi Kishimoto'],  // Naruto, Samurai 8  
            ['name' => 'Akira Toriyama'  ],  // Dragon Ball  
            ['name' => 'Hajime Isayama'  ],  // Attack on Titan  
            ['name' => 'Yoshihiro Togashi'],  // Hunter x Hunter, Yu Yu Hakusho  
            ['name' => 'Naoko Takeuchi'  ],  // Sailor Moon  
            ['name' => 'CLAMP'        ],  // Cardcaptor Sakura  
            ['name' => 'Nobuhiro Watsuki'],  // Rurouni Kenshin  
            ['name' => 'Katsura Hoshino' ],  // D.Gray-man  
            ['name' => 'Kōhei Horikoshi' ],  // My Hero Academia  
            ['name' => 'Yūsei Matsui'    ],  // Assassination Classroom  
            ['name' => 'Yūji Iwahara'    ],  // Cat Paradise  
            ['name' => 'Tsutomu Nihei'   ],  // Blame!  
            ['name' => 'Hiro Mashima'    ],  // Fairy Tail  
            ['name' => 'Kōhei Azano'     ],  // GetBackers  
            ['name' => 'Takeshi Konomi'  ],  // Prince of Tennis  
            ['name' => 'Hiroshi Takahashi'],  // Crows, Worst  
            ['name' => 'Tsugumi Ohba'    ],  // Death Note, Bakuman, Platinum End  

            // Autores
            ['name' => 'Rifujin na Magonote'  ],   // Mushoku Tensei  
            ['name' => 'Reki Kawahara'        ],   // SAO, Accel World  
            ['name' => 'Masashi Sogo'         ],   // The Rising of the Shield Hero  
            ['name' => 'Yoshitoki Ōima'       ],   // A Silent Voice  
            ['name' => 'Nisio Isin'           ],   // Monogatari Series  
            ['name' => 'Satoshi Wagahara'     ],   // The Devil is a Part-Timer!  

            // Ilustradores
            ['name' => 'Takeshi Obata'],  // Death Note, Bakuman  
            ['name' => 'ABEC'],  // Sword Art Online  
            ['name' => 'Yuka Nakajima'],  // Goblin Slayer  
            ['name' => 'Kiyotaka Haimura'],  // A Certain Magical Index  
            ['name' => 'Noizi Ito'],  // Haruhi Suzumiya  
            ['name' => 'Shirow Miwa'],  // Tokyo Ghoul  
            ['name' => 'Eiji Usatsuka'],  // Zero no Tsukaima  
            ['name' => 'Eiichi Aji'],  // Oreimo  
            ['name' => 'Hiro Kanzaki'],  // No Game No Life  
            ['name' => 'Yūgen Asuka'],  // The Devil is a Part-Timer!  
            ['name' => 'Kōsuke Fujishima'],  // Ah! My Goddess  
            ['name' => 'Yūichi Kumakura'],  // Spice and Wolf  
            ['name' => 'Hiroshi Takashige',],  // Darker than Black  

        ]);
    }
}
