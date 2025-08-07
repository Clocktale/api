<?php

namespace Database\Seeders;

use App\Models\Creators;
use App\Models\Genders;
use App\Models\Publishers;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Uncomment the following lines to seed specific models
        // $this->call([
        //     UsersSeeder::class,
        //     ContentsSeeder::class,
        //     StreamingsSeeder::class,
        //     ContentStarRatingsSeeder::class,
        //     UpdateRequestsSeeder::class,
        //     IncludeRequestsSeeder::class,
        // ]);

        $this->call([
            UsersSeeder::class,
            PublishersSeeder::class,
            GendersSeeder::class,
            CreatorsSeeder::class,
            StreamingsSeeder::class,
            ContentsSeeder::class,
        ]);
        
    }
}
