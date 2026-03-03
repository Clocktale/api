<?php

namespace App\Repositories\Eloquent;

use App\Http\RequestsValidations\StoreUserRequest;
use App\Repositories\Contracts\IUserRepository;
use App\Models\User;


class UserRepository implements IUserRepository
{
    /**
     * Handle the creation of a new user.
     *
     * @param StoreUserRequest $request
     * @return User
     */

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function createUser(User $user): User
    {
        $user->save();
        return $user;
    }
    public function updateUser(User $user): bool
    {
        return $user->save();
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}

