<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface IUserRepository
{
    public function findByEmail(string $email): ?User;

    public function createUser(User $user): User;

    public function updateUser(User $user): User;

    public function deleteUser(User $user): bool;
}
