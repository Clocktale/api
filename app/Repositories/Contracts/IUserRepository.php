<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface IUserRepository
{

    public function findByEmail(string $email): ?User;
    public function createUser(User $user);
    public function updateUser(User $user);
    public function deleteUser(User $user);

    // public function auth();
}