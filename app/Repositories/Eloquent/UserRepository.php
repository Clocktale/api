<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;

class UserRepository implements IUserRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::query()->with('roles')->where('email', $email)->first();
    }

    public function createUser(User $user): User
    {
        $user->save();

        return $user;
    }

    public function updateUser(User $user): User
    {
        $user->save();

        return $user;
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
