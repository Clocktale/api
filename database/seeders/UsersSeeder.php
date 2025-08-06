<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

use App\Models\User;

use function Laravel\Prompts\table;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'profile_picture' => 'profile_picture/default_icon.png',
                'nickname' => '012Katsu012',
                'name' => 'Kayc Paulo',
                'email' => 'katsu@clocktale.com',
                'password' => Hash::make('Katsu012@_'),
                'role' => 'admin',
                'created_at' => now(),
                'token' => Str::random(60),
                'token_expiration' => Carbon::now()->addDays(15),
            ],

            [
                'profile_picture' => 'profile_picture/default_icon.png',
                'nickname' => 'Admin_Account',
                'name' => 'Admin Example',
                'email' => 'admin@clocktale.com',
                'password' => Hash::make('Admin_User_12@'),
                'role' => 'admin',
                'create_at' => now(),
                'token' => Str::random(60),
                'token_expiration' => Carbon::now()->addDays(15),
            ],

            [
                'profile_picture' => 'profile_picture/default_icon.png',
                'nickname' => 'Cupcake',
                'name' => 'Amanda Smith',
                'email' => 'smith.amands@clocktale.com',
                'password' => Hash::make('Cupcake_12&'),
                'role' => 'user',
                'create_at' => now(),
                'token' => Str::random(60),
                'token_expiration' => Carbon::now()->addDays(15),
            ],

            [
                'profile_picture' => 'profile_picture/default_icon.png',
                'nickname' => 'Johnny_doe',
                'name' => 'John Doe',
                'email' => 'johnny.doe@clocktale.com',
                'password' => Hash::make('JohnnyDoe_12@'),
                'role' => 'user',
                'create_at' => now(),
                'token' => Str::random(60),
                'token_expiration' => Carbon::now()->addDays(15),
            ],

            [
                'profile_picture' => 'profile_picture/default_icon.png',
                'nickname' => 'Jane_Doe',
                'name' => 'Jane Doe',
                'email' => 'jane.doe@clocktale.com',
                'password' => Hash::make('JaneDoe_12@'),
                'role' => 'user',
                'create_at' => now(),
                'token' => Str::random(60),
                'token_expiration' => Carbon::now()->addDays(15),
            ],

            [
                'profile_picture' => 'profile_picture/default_icon.png',
                'nickname' => 'Mizuki',
                'name' => 'Maria',
                'email' => 'mizuki@clocktale.com',
                'password' => Hash::make('@Eu$0u_M@iZ#F0f0^Qx!st3'),
                'role' => 'user',
                'create_at' => now(),
                'token' => Str::random(60),
                'token_expiration' => Carbon::now()->addDays(15),
            ]
        ]);
    }
}
