<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Genders;
use App\Models\Studio;
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
        $this->call([
            UsersSeeder::class,
            StudioSeeder::class,
            GendersSeeder::class,
            AuthorsSeeder::class,
            StreamingsSeeder::class,
            StudioSeeder::class,
            ContentsSeeder::class,
            RoleSeeder::class
        ]);
        
    }
}
