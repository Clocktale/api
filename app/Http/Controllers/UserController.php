<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\StoreUserRequest;
use App\Http\RequestsValidations\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use App\Services\User\CreateUserService;
use App\Services\User\DeleteUserService;
use App\Services\User\UpdateUserService;

class UserController extends Controller
{
    public function __construct(
        private CreateUserService $createUserService,
        private UpdateUserService $updateUserService,
        private IUserRepository $userRepository
    ) {}

    public function store(StoreUserRequest $request)
    {
        $user = $this->createUserService->execute($request);

        return $this->success($user, 'User created successfully.', 201);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->authorize('update', $user);
        $updated = $this->updateUserService->execute($user, $request);

        return $this->success($updated, 'User updated successfully.', 200);
    }

    public function destroy(User $user, DeleteUserService $deleteUserService)
    {
        $deleted = $deleteUserService->execute($user);

        if ($deleted) {
            return $this->success(null, 'User deleted successfully.', 200);
        }

        return $this->error('User not found.', 404);
    }
}
