<?php 

namespace App\Services\User;
use App\Models\User;

use App\Repositories\Contracts\IUserRepository;

class DeleteUserService
{
    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function execute(User $user): bool
    {
        return $this->userRepository->deleteUser($user);
    }
}