<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Criar roles se não existirem
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $users = [
            [
                'nickname' => '012Katsu012',
                'username' => 'Kayc Paulo',
                'email' => 'katsu@clocktale.com',
                'password' => 'Silvanot12@e',
                'role' => $adminRole,
            ],
            [
                'nickname' => 'Admin_Account',
                'username' => 'Admin Example',
                'email' => 'admin@clocktale.com',
                'password' => 'Admin_User_12@',
                'role' => $adminRole,
            ],
            [
                'nickname' => 'Cupcake',
                'username' => 'Amanda Smith',
                'email' => 'smith.amands@clocktale.com',
                'password' => 'Cupcake_12&',
                'role' => $userRole,
            ],
            [
                'nickname' => 'Johnny_doe',
                'username' => 'John Doe',
                'email' => 'johnny.doe@clocktale.com',
                'password' => 'JohnnyDoe_12@',
                'role' => $userRole,
            ],
            [
                'nickname' => 'Jane_Doe',
                'username' => 'Jane Doe',
                'email' => 'jane.doe@clocktale.com',
                'password' => 'JaneDoe_12@',
                'role' => $userRole,
            ],
            [
                'nickname' => 'Mizuki',
                'username' => 'Maria',
                'email' => 'mizuki@clocktale.com',
                'password' => '@Eu$0u_M@iZ#F0f0^Qx!st3',
                'role' => $userRole,
            ],
        ];

        foreach ($users as $data) {

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'nickname' => $data['nickname'],
                    'username' => $data['username'],
                    'password' => Hash::make($data['password']),
                ]
            );

            $user->syncRoles([$data['role']->name]);
        }
    }
}
